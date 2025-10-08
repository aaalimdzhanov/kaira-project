<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Role;
use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            [
                'id' => 1,
                'title_ru' => 'Хлопок',
                'title_uz' => 'Paxta'
            ],
            [
                'id' => 2,
                'title_ru' => 'Шёлк',
                'title_uz' => 'Ipak',
            ],
            [
                'id' => 3,
                'title_ru' => 'Шерсть',
                'title_uz' => 'Jun',
            ],
            [
                'id' => 4,
                'title_ru' => 'Кашемир',
                'title_uz' => 'Kashmir',
            ],
            [
                'id' => 5,
                'title_ru' => 'Лён',
                'title_uz' => 'Zigʻir',
            ],
            [
                'id' => 6,
                'title_ru' => 'Полиэстер',
                'title_uz' => 'Polyester',
            ],
            [
                'id' => 7,
                'title_ru' => 'Вискоза',
                'title_uz' => 'Viskoza',
            ],
            [
                'id' => 8,
                'title_ru' => 'Акрил',
                'title_uz' => 'Akril',
            ],
            [
                'id' => 9,
                'title_ru' => 'Нейлон',
                'title_uz' => 'Naylon',
            ],
            [
                'id' => 10,
                'title_ru' => 'Кожа (натуральная)',
                'title_uz' => 'Tabiiy teri',
            ],
            [
                'id' => 11,
                'title_ru' => 'Эко-кожа',
                'title_uz' => 'Eko teri',
            ],
            [
                'id' => 12,
                'title_ru' => 'Замша',
                'title_uz' => 'Zamsha',
            ],
            [
                'id' => 13,
                'title_ru' => 'Джинсовая ткань',
                'title_uz' => 'Jins mato',
            ],
            [
                'id' => 14,
                'title_ru' => 'Атлас',
                'title_uz' => 'Atlas',
            ],
            [
                'id' => 15,
                'title_ru' => 'Микрофибра',
                'title_uz' => 'Mikrofibra',
            ],
        ];


        Material::insert($materials);
    }
}
