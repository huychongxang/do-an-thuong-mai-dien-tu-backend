<?php

namespace App\Models;


class Product extends BaseModel
{
    protected $table = 'products';
    protected $fillable = ['sku', 'name', 'description', 'content', 'image', 'price', 'cost', 'sold', 'stock', 'kind', 'virtual', 'status', 'sort', 'date_lastview', 'date_available', 'featured'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'category_product', 'product_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }

    public function promotionPrice()
    {
        return $this->hasOne(ProductPromotion::class, 'product_id', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    */

    protected static function boot()
    {
        parent::boot();
        static::deleting(function (Product $product) {
            $product->images()->delete();
            $product->categories()->detach();
            $product->attributes()->delete();
        });
    }

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

    public function getFinalPrice()
    {
        $promotion = $this->processPromotionPrice();
        if ($promotion) {
            return $promotion;
        } else {
            return $this->price;
        }
    }

    private function processPromotionPrice()
    {
        $promotion = $this->promotionPrice;
        if ($promotion) {
            if (($promotion['date_end'] >= date("Y-m-d") || $promotion['date_end'] == null)
                && ($promotion['date_start'] <= date("Y-m-d") || $promotion['date_start'] == null)
                && $promotion['status_promotion'] = 1) {
                return $promotion['price_promotion'];
            }
        }

        return false;
    }

    public static function updateStock($product_id, $qty_change)
    {
        $item = Product::find($product_id);
        if ($item) {
            $item->stock = $item->stock - $qty_change;
            $item->sold = $item->sold + $qty_change;
            $item->save();
        }
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

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
