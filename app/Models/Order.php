<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['user_id', 'subtotal', 'shipping', 'discount', 'payment_status',
        'shipping_status', 'status', 'tax', 'total', 'received', 'first_name', 'last_name',
        'address1', 'address2', 'phone', 'email', 'comment', 'payment_method', 'shipping_method'];

    const NOT_YET_PAY = 1;
    const PART_PAY = 2;
    const PAID = 3;
    const NEED_REFUND = 4;

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
        // before delete() method call this
        static::deleting(function ($order) {
            foreach ($order->details as $key => $orderDetail) {
                $item = Product::find($orderDetail->product_id);
                //Update stock, sold
                Product::updateStock($orderDetail->product_id, -$orderDetail->quantity);

            }
            $order->details()->delete(); //delete order details
            $order->histories()->delete(); //delete history
        });
    }

    public static function updateSubTotal($order_id, $subtotal_value)
    {
        $order = Order::find($order_id);
        $order->subtotal = $subtotal_value;
        $total = $subtotal_value + $order->discount + $order->shipping;
        $balance = $total - $order->received;
        if ($balance == $total) {
            $payment_status = self::NOT_YET_PAY; //Not pay
        } elseif ($balance < 0) {
            $payment_status = self::NEED_REFUND; //Need refund
        } elseif ($balance == 0) {
            $payment_status = self::PAID; //Paid
        } else {
            $payment_status = self::PART_PAY; //Part pay
        }
        $order->payment_status = $payment_status;
        $order->total = $total;
        $order->balance = $balance;
        $order->save();
    }

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

    public function histories()
    {
        return $this->hasMany(OrderHistory::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */
    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeNew($query)
    {
        $idNewStatus = OrderStatus::where('name', 'new')->first()->id;
        return $query->where('status', $idNewStatus);
    }

}
