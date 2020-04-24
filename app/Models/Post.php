<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'admin_id', 'title', 'slug', 'excerpt', 'body', 'image', 'published_at', 'deleted_at'
    ];

    use SoftDeletes;
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
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function author()
    {
        return $this->belongsTo(Admin::class, 'admin_user', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeMoiNhat($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function scopeScheduled($query)
    {
        return $query->where("published_at", ">", Carbon::now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }
}
