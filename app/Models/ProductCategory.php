<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use Sluggable;

    protected $table = 'product_categories';

    protected $fillable = ['name', 'slug', 'description', 'parent_id', 'featured', 'status', 'image'];

    protected $casts = [
        'parent_id' => 'integer',
        'featured' => 'boolean',
        'status' => 'boolean'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
                'unique' => true,
                'separator' => '-'
            ]
        ];
    }

    //Relationships
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
}
