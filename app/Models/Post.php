<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends BaseModel
{
    protected $table = 'posts';
    protected $fillable = [
        'admin_id', 'title', 'slug', 'excerpt', 'body', 'image', 'published_at', 'deleted_at', 'category_id'
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

    public function isOwned()
    {
        return $this->admin_id == auth()->user()->id;
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function author()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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

    public function scopeFilter($query, $filter)
    {
        if (isset($filter['month']) && $month = $filter['month']) {
            $query->whereMonth('published_at', Carbon::parse($month)->month);
        }
        if (isset($filter['year']) && $year = $filter['year']) {
            $query->whereYear('published_at', $year);
        }

        if (isset($filter['term']) && $term = $filter['term']) {
            $query->where(function ($q) use ($term) {
                $q->whereHas('author', function ($qr) use ($term) {
                    $qr->where('name', 'LIKE', "%{$term}%");
                });
                $q->orWhereHas('category', function ($qr) use ($term) {
                    $qr->where('title', 'LIKE', "%{$term}%");
                });
                $q->orWhere('title', 'LIKE', "%{$term}%");
                $q->orWhere('excerpt', 'LIKE', "%{$term}%");
            });
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor
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
    | Mutators
    |--------------------------------------------------------------------------
    */
    public function setImageAttribute($value)
    {
        $this->uploadImageBase64('image', 'store', 'post', $value);
    }

}
