<?php

namespace App\Http\Resources\Api\Post;

use App\Http\Resources\Api\Category\CategoriesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'link' => route('api.post_detail', $this->id),
            'author' => $this->author,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'image' => ($this->image) ?: null,
            'published_at' => $this->published_at,
            'category' => CategoriesResource::make($this->category)
        ];
    }
}
