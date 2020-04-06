<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attribute';
    protected $fillable = ['value', 'attribute_group_id', 'product_id'];
    public $timestamps = false;


    public function attributeGroup()
    {
        return $this->belongsTo(ProductAttributeGroup::class, 'attribute_group_id', 'id');
    }
}
