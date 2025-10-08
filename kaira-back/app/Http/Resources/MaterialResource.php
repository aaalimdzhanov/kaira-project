<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    public function toArray($request)
    {
        $lang = request()->get('lang', 'ru');

        return [
            'id'    => $this->id,
            'title' => $lang === 'uz' ? $this->title_uz : $this->title_ru,
            'key'   => $this->key,
        ];
    }
}
