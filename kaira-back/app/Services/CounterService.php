<?php

namespace App\Services;

use App\Dto\OrderDto;
use App\Models\Category;
use App\Models\Counter;
use App\Models\Order;




class CounterService
{
    public function generateCodeForProduct(Category $category):string
    {
        $counter = Counter::firstOrCreate(['prefix' => $category->key], ['last_number' => 0]);
        $counter->increment('last_number');
        $newNumber = $counter->last_number;
        return $category->key . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }

}
