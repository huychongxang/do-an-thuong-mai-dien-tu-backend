<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPromotion extends Model
{
    public $table = 'product_promotions';
    protected $fillable = ['product_id', 'price_promotion', 'date_start', 'date_end', 'status_promotion'];


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
