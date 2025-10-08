<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    public function run()
    {
        $country = [
            [
                'id'    => 1,
                'title_ru' => 'Китай',
                'title_uz' => 'Xitoy'
            ],
            [
                'id'    => 2,
                'title_ru' => 'Туркия',
                'title_uz' => 'Turkiya',
            ],
            [
                'id'    => 3,
                'title_ru' => 'Узбекистан',
                'title_uz' => 'O\'zbekiston'
            ],
            [
                'id'    => 4,
                'title_ru' => 'Дубай',
                'title_uz' => 'Dubay'
            ],
            [
                'id'    => 5,
                'title_ru' => 'Италия',
                'title_uz' => 'Italiya'
            ],

        ];

        Country::insert($country);
    }
}
