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

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    */

    public function getCategoriesList()
    {
        $categories = $this->categories;
        $html = '';
        foreach ($categories as $key => $category) {
            if ($key == 0) {
                $html .= $category->name;
            } else {
                $html .= ", " . $category->name;
            }

        }
        return $html;
    }

    public function getType()
    {
        $type = $this->getOriginal('type');
        switch ($type) {
            case 0:
                return 'Normal';
            case 1:
                return 'New';
            case 2:
                return 'Hot';
            default:
                return 'Normal';
        }
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

    public function getCostHtml()
    {
        $value = $this->getOriginal('cost');
        return number_format($value) . ' đ';
    }

    public function getPriceHtml()
    {
        $value = $this->getOriginal('price');
        return number_format($value) . ' đ';
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
        $this->uploadImageBase64('image', 'store', 'product', $value);
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
