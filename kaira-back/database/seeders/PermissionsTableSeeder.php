<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_create',
            ],
            [
                'id'    => 18,
                'title' => 'product_edit',
            ],
            [
                'id'    => 19,
                'title' => 'product_show',
            ],
            [
                'id'    => 20,
                'title' => 'product_delete',
            ],
            [
                'id'    => 21,
                'title' => 'product_access',
            ],
            [
                'id'    => 22,
                'title' => 'order_edit',
            ],
            [
                'id'    => 23,
                'title' => 'order_show',
            ],
            [
                'id'    => 24,
                'title' => 'order_access',
            ],
            [
                'id'    => 25,
                'title' => 'catalog_access',
            ],
            [
                'id'    => 26,
                'title' => 'color_create',
            ],
            [
                'id'    => 27,
                'title' => 'color_edit',
            ],
            [
                'id'    => 28,
                'title' => 'color_show',
            ],
            [
                'id'    => 29,
                'title' => 'color_delete',
            ],
            [
                'id'    => 30,
                'title' => 'color_access',
            ],
            [
                'id'    => 31,
                'title' => 'size_create',
            ],
            [
                'id'    => 32,
                'title' => 'size_edit',
            ],
            [
                'id'    => 33,
                'title' => 'size_show',
            ],
            [
                'id'    => 34,
                'title' => 'size_delete',
            ],
            [
                'id'    => 35,
                'title' => 'size_access',
            ],
            [
                'id'    => 36,
                'title' => 'material_create',
            ],
            [
                'id'    => 37,
                'title' => 'material_edit',
            ],
            [
                'id'    => 38,
                'title' => 'material_show',
            ],
            [
                'id'    => 39,
                'title' => 'material_delete',
            ],
            [
                'id'    => 40,
                'title' => 'material_access',
            ],
            [
                'id'    => 41,
                'title' => 'category_create',
            ],
            [
                'id'    => 42,
                'title' => 'category_edit',
            ],
            [
                'id'    => 43,
                'title' => 'category_show',
            ],
            [
                'id'    => 44,
                'title' => 'category_delete',
            ],
            [
                'id'    => 45,
                'title' => 'category_access',
            ],
            [
                'id'    => 46,
                'title' => 'product_value_create',
            ],
            [
                'id'    => 47,
                'title' => 'product_value_edit',
            ],
            [
                'id'    => 48,
                'title' => 'product_value_show',
            ],
            [
                'id'    => 49,
                'title' => 'product_value_delete',
            ],
            [
                'id'    => 50,
                'title' => 'product_value_access',
            ],
            [
                'id'    => 51,
                'title' => 'season_create',
            ],
            [
                'id'    => 52,
                'title' => 'season_edit',
            ],
            [
                'id'    => 53,
                'title' => 'season_show',
            ],
            [
                'id'    => 54,
                'title' => 'season_delete',
            ],
            [
                'id'    => 55,
                'title' => 'season_access',
            ],
            [
                'id'    => 56,
                'title' => 'brand_create',
            ],
            [
                'id'    => 57,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 58,
                'title' => 'brand_show',
            ],
            [
                'id'    => 59,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 60,
                'title' => 'brand_access',
            ],
            [
                'id'    => 61,
                'title' => 'country_create',
            ],
            [
                'id'    => 62,
                'title' => 'country_edit',
            ],
            [
                'id'    => 63,
                'title' => 'country_show',
            ],
            [
                'id'    => 64,
                'title' => 'country_delete',
            ],
            [
                'id'    => 65,
                'title' => 'country_access',
            ],
            [
                'id'    => 66,
                'title' => 'order_item_show',
            ],
            [
                'id'    => 67,
                'title' => 'order_item_access',
            ],
            [
                'id'    => 68,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
