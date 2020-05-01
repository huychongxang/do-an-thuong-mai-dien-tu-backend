<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

class Category extends BaseModel
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'image'];

    use Sluggable;

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */
    public function setNameAttribute($value)
    {
        $value = trim($value);
        $value = ucwords($value);
        $this->attributes['name'] = $value;
    }

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
        $this->uploadImageBase64('image', 'store', 'category', $value);
    }
}
