<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id'    => 1,
                'title_ru' => 'Платья',
                'title_uz' => 'Roylaklar',
                'key'=>'clothing'
            ],
            [
                'id'    => 2,
                'title_ru' => 'Платок',
                'title_uz' => 'Romol',
                'key'=>'scarves'
            ],
            [
                'id'    => 3,
                'title_ru' => 'Аксессуар',
                'title_uz' => 'Aksesuarlar',
                'key'=>'accessories'
            ],
        ];

        Category::insert($categories);
    }
}
