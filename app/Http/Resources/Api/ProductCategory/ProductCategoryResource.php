<?php

namespace App\Http\Resources\Api\ProductCategory;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => ($this->image) ?: null,
            'link' => route('api.by_category_id', $this->id)
        ];
    }
}
