<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use TypiCMS\NestableTrait;

class ProductCategory extends BaseModel
{
    use Sluggable;
    use NestableTrait;

    protected $table = 'product_categories';
    protected $disk = 'store';

    protected $fillable = ['name', 'slug', 'description', 'featured', 'parent_id', 'status'];

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
            $html = '<span class="badge bg-success">ON</span>';
        } else {
            $html = '<span class="badge bg-danger">OFF</span>';
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
}
