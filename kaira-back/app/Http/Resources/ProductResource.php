<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
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
