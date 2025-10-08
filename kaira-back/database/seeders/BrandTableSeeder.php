<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    public function run()
    {
        $brands = [
            [
                'id'    => 1,
                'title_ru' => 'Hermès',
                'title_uz' => 'Hermès'
            ],
            [
                'id'    => 2,
                'title_ru' => 'Louis Vuitton',
                'title_uz' => 'Louis Vuitton',
            ],
            [
                'id'    => 3,
                'title_ru' => 'Gucci',
                'title_uz' => 'Gucci'
            ],
            [
                'id'    => 4,
                'title_ru' => 'Chanel',
                'title_uz' => 'Chanel'
            ],
            [
                'id'    => 5,
                'title_ru' => 'Dior',
                'title_uz' => 'Dior'
            ],
            [
                'id'    => 6,
                'title_ru' => 'Etro',
                'title_uz' => 'Etro'
            ],
            [
                'id'    => 7,
                'title_ru' => 'Valentino',
                'title_uz' => 'Valentino'
            ],
            [
                'id'    => 8,
                'title_ru' => 'Salvatore Ferragamo',
                'title_uz' => 'Salvatore Ferragamo'
            ],
            [
                'id'    => 9,
                'title_ru' => 'Fendi',
                'title_uz' => 'Fendi'
            ],
            [
                'id'    => 10,
                'title_ru' => 'Burberry',
                'title_uz' => 'Burberry'
            ],

        ];

        Brand::insert($brands);
    }
}
