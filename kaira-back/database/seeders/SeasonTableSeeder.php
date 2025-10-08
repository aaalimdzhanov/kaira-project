<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Country;
use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonTableSeeder extends Seeder
{
    public function run()
    {
        $seasons = [
            [
                'id'    => 1,
                'title_ru' => 'Зима',
                'title_uz' => 'Qish'
            ],
            [
                'id'    => 2,
                'title_ru' => 'Весна',
                'title_uz' => 'Bahor',
            ],
            [
                'id'    => 3,
                'title_ru' => 'Лето',
                'title_uz' => 'Yoz'
            ],
            [
                'id'    => 4,
                'title_ru' => 'Осень',
                'title_uz' => 'Kuz'
            ],

        ];

        Season::insert($seasons);
    }
}
