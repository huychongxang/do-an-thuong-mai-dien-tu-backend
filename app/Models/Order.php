<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['user_id', 'subtotal', 'shipping', 'discount', 'payment_status',
        'shipping_status', 'status', 'tax', 'total', 'received', 'first_name', 'last_name',
        'address1', 'address2', 'phone', 'email', 'comment', 'payment_method', 'shipping_method'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'status', 'id');
    }

    public function shippingStatus()
    {
        return $this->belongsTo(ShippingStatus::class, 'shipping_status', 'id');
    }
}
