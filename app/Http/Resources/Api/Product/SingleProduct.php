<?php

namespace App\Http\Resources\Api\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleProduct extends JsonResource
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
            'sku' => $this->sku,
            'description' => $this->description,
            'content' => $this->content,
            'image' => $this->image,
            'sub_images' => $this->images,
            'attributes' => $this->attributes,
            'price' => $this->price,
            'promotion_price' => ($this->processPromotionPrice()) ?? null,
            'type' => $this->getType(),
            'featured' => $this->featured ? true : false,
        ];
    }
}
