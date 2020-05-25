<?php

namespace App\Http\Resources\WebApi\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ListProduct extends JsonResource
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
            'image' => $this->image,
            'sub_image' => $this->getFirstSubImage(),
            'price' => $this->price,
            'price_format'=>number_format($this->price) .' VNĐ',
            'promotion_price' => $this->promotionPrice->price_promotion ?? null,
            'promotion_price_format' => ($this->promotionPrice) ? number_format($this->promotionPrice->price_promotion) . ' VNĐ': null,
            'type'=>$this->getType(),
            'description'=>$this->description,
        ];
    }
}
