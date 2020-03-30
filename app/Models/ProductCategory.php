<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends BaseModel
{
    use Sluggable;

    protected $table = 'product_categories';
    protected $disk = 'store';

    protected $fillable = ['name', 'slug', 'description', 'featured', 'image', 'parent_id', 'status'];

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    public function isRoot()
    {
        return $this->slug == 'root';
    }

    public function getStatusHtml()
    {
        $status = $this->getOriginal('status');
        if ($status == 1) {
            $html = '<div class="alert alert-success" role="alert">On</div>';
        } else {
            $html = '<div class="alert alert-danger" role="alert">Off</div>';
        }
        return $html;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPsS
    |--------------------------------------------------------------------------
    */
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getImageAttribute($value)
    {
        if (!$value) {
            return '';
        }
        $destinationPath = "uploads";
        return asset($destinationPath . '/' . $value);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = $this->disk;
        $destination_path = 'product-category';
        $this->uploadFile($attribute_name, $disk, $destination_path, $value);
    }

    public function setStatusAttribute($value)
    {
        if (strtolower($value) == 'on') {
            $this->attributes['status'] = 1;
        } else {
            $this->attributes['status'] = 0;
        }
    }
}
