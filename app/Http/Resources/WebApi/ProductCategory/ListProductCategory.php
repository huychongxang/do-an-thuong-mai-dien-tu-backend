<?php

namespace App\Http\Resources\WebApi\ProductCategory;

use Illuminate\Http\Resources\Json\JsonResource;

class ListProductCategory extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
