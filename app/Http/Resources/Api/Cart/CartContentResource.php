<?php

namespace App\Http\Resources\Api\Cart;

use Illuminate\Http\Resources\Json\JsonResource;

class CartContentResource extends JsonResource
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
            'row_id' => $this['rowId'],
            'product_id' => $this['id'],
            'name' => $this['name'],
            'qty' => $this['qty'],
            'price' => $this['price'],
            'options' => $this['options'],
            'sub_total' => $this['price'] * $this['qty']
        ];
    }
}
