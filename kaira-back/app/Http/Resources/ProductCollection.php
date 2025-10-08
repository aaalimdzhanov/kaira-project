<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => ProductResource::collection($this->collection),
            'meta' => [
                'current_page' => $this->resource->currentPage(),
                'last_page'    => $this->resource->lastPage(),
                'per_page'     => $this->resource->perPage(),
                'total'        => $this->resource->total(),
            ],
            'links' => [
                'prev' => $this->resource->previousPageUrl(),
                'next' => $this->resource->nextPageUrl(),
            ],
        ];
    }
}
