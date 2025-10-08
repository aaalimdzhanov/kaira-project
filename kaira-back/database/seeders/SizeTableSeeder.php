<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            [
                'id'    => 1,
                'title' => 'XS',
            ],
            [
                'id'    => 2,
                'title' => 'S',
            ],
            [
                'id'    => 3,
                'title' => 'M',
            ],
            [
                'id'    => 4,
                'title' => 'L',
            ],
            [
                'id'    => 5,
                'title' => 'XL',
            ],
            [
                'id'    => 6,
                'title' => 'XXL',
            ],
            [
                'id'    => 7,
                'title' => 'XXXL',
            ],

            // --- SCARVES / SHAWLS (платки и шарфы) ---
            [
                'id'    => 8,
                'title' => '70x70',
            ],
            [
                'id'    => 9,
                'title' => '90x90',
            ],
            [
                'id'    => 10,
                'title' => '120x120',
            ],
            [
                'id'    => 11,
                'title' => '30x140',
            ],
            [
                'id'    => 12,
                'title' => '40x160',
            ],

            // --- ACCESSORIES (аксессуары: ремни, браслеты, кольца и т.д.) ---
            [
                'id'    => 13,
                'title' => 'One Size',
            ],
            [
                'id'    => 14,
                'title' => 'Adjustable',
            ],
            [
                'id'    => 15,
                'title' => 'S/M',
            ],
            [
                'id'    => 16,
                'title' => 'M/L',
            ],
        ];
        Size::insert($sizes);
    }
}
