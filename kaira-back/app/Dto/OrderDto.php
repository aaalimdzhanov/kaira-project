<?php

namespace App\Dto;

class OrderDto
{
    public function __construct(
        public string $phone,
        public float $totalAmount
    )
    {
    }
}
