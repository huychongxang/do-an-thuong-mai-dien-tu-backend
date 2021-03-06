<?php

namespace App\Http\Resources\Api\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttribute extends JsonResource
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
            'value' => $this->value
        ];
    }
}
