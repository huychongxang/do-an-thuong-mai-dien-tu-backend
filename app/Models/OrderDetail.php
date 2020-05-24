<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
        'order_id', 'product_id', 'name', 'price', 'quantity', 'total_price', 'sku', 'attribute'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    */

    public function getAttributeFormat()
    {
        $attribute = $this->getOriginal('attribute');
        $attribute = json_decode($attribute);
        if (gettype($attribute) == 'array') return null;
        $newOptions = [];
        foreach ($attribute as $idGroupAttribute => $value) {
            $code = ProductAttributeGroup::where('id', $idGroupAttribute)->first()->code;
            $newOptions[$code] = $value;
        }
        return $newOptions;
    }
}
