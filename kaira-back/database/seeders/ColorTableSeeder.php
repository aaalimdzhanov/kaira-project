<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            [
                'id' => 1,
                'title_ru' => 'Белый',
                'title_uz' => 'Oq',
                'key' => '#FFFFFF'
            ],
            [
                'id' => 2,
                'title_ru' => 'Чёрный',
                'title_uz' => 'Qora',
                'key' => '#000000'
            ],
            [
                'id' => 3,
                'title_ru' => 'Серый',
                'title_uz' => 'Kulrang',
                'key' => '#808080'
            ],
            [
                'id' => 4,
                'title_ru' => 'Красный',
                'title_uz' => 'Qizil',
                'key' => '#FF0000'
            ],
            [
                'id' => 5,
                'title_ru' => 'Синий',
                'title_uz' => 'Koʻk',
                'key' => '#0000FF'
            ],
            [
                'id' => 6,
                'title_ru' => 'Голубой',
                'title_uz' => 'Havorang',
                'key' => '#87CEEB'
            ],
            [
                'id' => 7,
                'title_ru' => 'Зелёный',
                'title_uz' => 'Yashil',
                'key' => '#008000'
            ],
            [
                'id' => 8,
                'title_ru' => 'Жёлтый',
                'title_uz' => 'Sariq',
                'key' => '#FFFF00'
            ],
            [
                'id' => 9,
                'title_ru' => 'Оранжевый',
                'title_uz' => 'Toʻq sariq',
                'key' => '#FFA500'
            ],
            [
                'id' => 10,
                'title_ru' => 'Розовый',
                'title_uz' => 'Pushti',
                'key' => '#FFC0CB'
            ],
            [
                'id' => 11,
                'title_ru' => 'Фиолетовый',
                'title_uz' => 'Siyohrang',
                'key' => '#800080'
            ],
            [
                'id' => 12,
                'title_ru' => 'Бежевый',
                'title_uz' => 'Bej',
                'key' => '#F5F5DC'
            ],
            [
                'id' => 13,
                'title_ru' => 'Коричневый',
                'title_uz' => 'Jigarrang',
                'key' => '#8B4513'
            ],
            [
                'id' => 14,
                'title_ru' => 'Золотой',
                'title_uz' => 'Oltin rang',
                'key' => '#FFD700'
            ],
            [
                'id' => 15,
                'title_ru' => 'Серебряный',
                'title_uz' => 'Kumush rang',
                'key' => '#C0C0C0'
            ],
            [
                'id' => 16,
                'title_ru' => 'Бордовый',
                'title_uz' => 'Toʻq qizil',
                'key' => '#800000'
            ],
            [
                'id' => 17,
                'title_ru' => 'Хаки',
                'title_uz' => 'Xaki',
                'key' => '#F0E68C'
            ],
            [
                'id' => 18,
                'title_ru' => 'Мятный',
                'title_uz' => 'Yalpiz rang',
                'key' => '#98FF98'
            ],
        ];

        Color::insert($colors);
    }
}
