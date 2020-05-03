<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends BaseModel
{
    use Sluggable;

    protected $table = 'product_categories';
    protected $disk = 'store';

    protected $fillable = ['name', 'slug', 'description', 'featured', 'status', 'image'];

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

    public function getStatusHtml()
    {
        $status = $this->getOriginal('status');
        if ($status == 1) {
            $html = '<span class="badge bg-success">ON</span>';
        } else {
            $html = '<span class="badge bg-danger">OFF</span>';
        }
        return $html;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product','category_id','product_id','id','id');
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

    public function setStatusAttribute($value)
    {
        if (strtolower($value) == 'on') {
            $this->attributes['status'] = 1;
        } else {
            $this->attributes['status'] = 0;
        }
    }

    public function setImageAttribute($value)
    {
        $this->uploadImageBase64('image', 'store', 'category', $value);
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
