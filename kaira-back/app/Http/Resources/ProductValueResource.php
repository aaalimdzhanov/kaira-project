<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductValueResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'price'         => $this->price,
            'initial_price' => $this->initial_price,
            'old_price'     => $this->old_price,
            'discount'      => $this->discount,
            'discount_start'=> $this->discount_start,
            'discount_end'  => $this->discount_end,
            'stock'         => $this->stock,
            'code'         => $this->code,
            'image' => [
                'url'       => $this->getFirstMediaUrl('image'),
                'thumb' => $this->getFirstMediaUrl('image', 'thumb'),
                'preview'   => $this->getFirstMediaUrl('image', 'preview'),
                'thumbnail'   => $this->getFirstMediaUrl('image', 'thumbnail'),
                'large'   => $this->getFirstMediaUrl('image', 'large'),
            ],

            'color' => new ColorResource($this->whenLoaded('color')),
            'size'  => new SizeResource($this->whenLoaded('size')),
        ];
    }
}
