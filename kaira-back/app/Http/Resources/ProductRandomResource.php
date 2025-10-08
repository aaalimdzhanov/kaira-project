<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRandomResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'description'      => $this->description,
            'category'    => $this->whenLoaded('category', function () {
                return [
                    'id'  => $this->category->id,
                    'key' => $this->category->key,
                ];
            }),
            'image' => [
                'url'       => $this->getFirstMediaUrl('image'),
                'thumbnail' => $this->getFirstMediaUrl('image', 'thumb'),
                'preview'   => $this->getFirstMediaUrl('image', 'preview'),
                'fixed_height'   => $this->getFirstMediaUrl('image', 'fixed_height'),
            ],
            'price' => $this->values()->min('price'),
        ];
    }
}
