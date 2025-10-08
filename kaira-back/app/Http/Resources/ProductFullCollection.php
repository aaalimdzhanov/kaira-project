<?php

namespace App\Http\Resources;
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductFullCollection extends ResourceCollection
{
    public function toArray($request)
    {
        // map через Resource без mapInto()
        return [
            'data' => ProductFullResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'current_page' => $this->currentPage(),
                'last_page'    => $this->lastPage(),
                'per_page'     => $this->perPage(),
                'total'        => $this->total(),
            ],
            'links' => [
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl(),
            ],
        ];
    }
}
