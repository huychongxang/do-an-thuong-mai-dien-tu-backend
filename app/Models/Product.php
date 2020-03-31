<?php

namespace App\Models;


class Product extends BaseModel
{
    protected $table = 'products';
    protected $fillable = ['sku', 'name', 'description', 'content', 'image', 'price', 'cost', 'sold', 'stock', 'kind', 'virtual', 'status', 'sort', 'date_lastview', 'date_available'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'category_product', 'product_id', 'category_id');
    }
}
