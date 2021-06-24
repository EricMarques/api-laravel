<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        /*return [
            'name' => $this->name,
            'price' => $this->price
        ];*/
        return $this->resource->toArray();
    }

    public function with($request)
    {
        return ['extra_single_data' => 'Extra Single Data'];
    }
}
