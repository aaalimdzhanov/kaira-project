<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Counter;
use Illuminate\Database\Seeder;

class CounterTableSeeder extends Seeder
{
    public function run()
    {
        $counters = [
            [
                'id'    => 1,
                'prefix' => 'accessories',
                'last_number' => 0
            ],
            [
                'id'    => 2,
                'prefix' => 'clothing',
                'last_number' => 0
            ],
            [
                'id'    => 3,
                'prefix' => 'scarves',
                'last_number' => 0
            ],

        ];

        Counter::insert($counters);
    }
}
