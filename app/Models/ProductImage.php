<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends BaseModel
{
    protected $table = 'product_images';

    protected $fillable = ['image', 'product_id'];

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

    public function setImageAttribute($value)
    {
        $this->uploadImageBase64('image', 'store', 'product/sub-images', $value);
    }
}
