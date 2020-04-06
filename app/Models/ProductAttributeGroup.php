<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeGroup extends Model
{
    protected $table = 'product_attribute_groups';
    protected $fillable = ['name', 'code', 'type'];
    protected $guarded = [];
    public $timestamps = false;
    protected static $getList = null;

    public static function getList()
    {
        if (!self::$getList) {
            self::$getList = self::pluck('name', 'id')->all();
        }
        return self::$getList;
    }

    public function attributeDetails()
    {
        return $this->hasMany(ProductAttribute::class, 'attribute_group_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($group) {
            $group->attributeDetails()->delete();
        });
    }
}
