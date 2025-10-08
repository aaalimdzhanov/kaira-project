<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductFullResource extends JsonResource
{
    public function toArray($request)
    {
        $lang = $request->get('lang', 'ru');

        return [
            'id'          => $this->id,
            'name'        => $lang === 'ru' ? $this->name_ru : $this->name_uz,
            'description' => $lang === 'ru' ? $this->description_ru : $this->description_uz,
            'category'    => $this->category,
            'season'      => $this->season,
            'brands'      => $this->brand,
            'country'   => $this->country,
            'min_price'   => $this->values()->min('price'),
            'material' => $this->material,
            'values' => ProductValueResource::collection($this->whenLoaded('values')),
        ];
    }
}
