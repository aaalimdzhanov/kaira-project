<?php

namespace App\Dto;

class OrderItemDto
{
    public function __construct(
        public string $productItemId,
        public int $quantity,
        public bool $giftWrap,
        public int $productId,
        public float $price,
        public string $code,

    )
    {
    }
}
