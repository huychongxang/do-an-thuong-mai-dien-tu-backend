<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug'];

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
}
