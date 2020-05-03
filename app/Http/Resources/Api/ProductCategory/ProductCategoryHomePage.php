<?php

namespace App\Http\Resources\Api\ProductCategory;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryHomePage extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'image' => $this->image,
            'url' => route('api.by_category_id', $this->id),
        ];
    }
}
