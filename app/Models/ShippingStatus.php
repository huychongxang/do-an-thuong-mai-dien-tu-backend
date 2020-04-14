<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingStatus extends Model
{
    protected $table = 'shipping_statuses';

    protected $fillable = ['name', 'label'];
}
