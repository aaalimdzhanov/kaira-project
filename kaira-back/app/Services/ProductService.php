<?php

namespace App\Services;

use App\Enums\LangEnum;
use App\Enums\ProductStatus;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductFullResource;
use App\Http\Resources\ProductRandomResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductValue;

class ProductService
{
    public function getProducts(int $perPage, int $page, string $category, string $lang)
    {
        $category = Category::where("key", $category)->firstOrFail();
        $columns = [
            'id',
            $lang == LangEnum::RU->value ? 'name_ru as name' : 'name_uz as name',
        ];
        $products = Product::where('status', ProductStatus::PUBLIC->value)
        ->where('category_id', $category->id)
            ->paginate($perPage, $columns, 'page', $page);
        return new ProductCollection($products);
    }
    public function getVariantById(int $productId, string $lang)
    {
        $product = Product::with([
            'values.color' => function ($q) use ($lang) {
                $q->select(
                    'id',
                    $lang === LangEnum::RU->value ? 'title_ru as title' : 'title_uz as title',
                    'key'
                );
            },
            'values.size',
            'material' => function ($q) use ($lang) {
                $q->select(
                    'id',
                    $lang === LangEnum::RU->value ? 'title_ru as title' : 'title_uz as title',
                );
            },
            'category' => function ($q) use ($lang) {
                $q->select(
                    'id',
                    $lang === LangEnum::RU->value ? 'title_ru as title' : 'title_uz as title',
                    'key'
                );
            },
            'season' => function ($q) use ($lang) {
                $q->select(
                    'id',
                    $lang === LangEnum::RU->value ? 'title_ru as title' : 'title_uz as title'
                );
            },
            'brand' => function ($q) use ($lang) {
                $q->select(
                    'id',
                    $lang === LangEnum::RU->value ? 'title_ru as title' : 'title_uz as title'
                );
            },
            'country' => function ($q) use ($lang) {
                $q->select(
                    'id',
                    $lang === LangEnum::RU->value ? 'title_ru as title' : 'title_uz as title'
                );
            },
        ])
            ->where('id', $productId)
            ->where('status', ProductStatus::PUBLIC->value)
            ->firstOrFail();

        return new ProductFullResource($product);
    }

    public function getRandomProducts(string $lang)
    {
        $nameColumn = $lang === LangEnum::RU->value ? 'name_ru as name' : 'name_uz as name';
        $descColumn = $lang === LangEnum::RU->value ? 'description_ru as description' : 'description_uz as description';

        $products = Product::with('category') // подгружаем связь
        ->inRandomOrder()
            ->take(10)
            ->get(['id', $nameColumn, $descColumn, 'category_id']); // обязательно category_id

        return ProductRandomResource::collection($products);
    }

    public function getRandomLatestProducts(string $lang)
    {
        $columns = [
            'id',
            $lang == LangEnum::RU->value ? 'name_ru as name' : 'name_uz as name',
            $lang == LangEnum::RU->value ? 'description_ru as description' : 'description_uz as description',
            'category_id',
        ];

        $products = Product::with('category') // добавляем связь
        ->orderBy('id', 'desc')
            ->take(50)
            ->inRandomOrder()
            ->take(10)
            ->get($columns);

        return ProductRandomResource::collection($products);
    }

    public function getRandomOffsetProducts(string $lang)
    {
        $columns = [
            'id',
            $lang == LangEnum::RU->value ? 'name_ru as name' : 'name_uz as name',
            $lang == LangEnum::RU->value ? 'description_ru as description' : 'description_uz as description',
            'category_id',
        ];
        $total = Product::count();
        $offset = rand(0, max($total - 10, 0));
        $products =  Product::with('category')->skip($offset)->take(10)->get($columns);
        return ProductRandomResource::collection($products);
    }

    public function getRandomSteppedProducts(string $lang, int $step = 5)
    {
        $columns = [
            'id',
            $lang == LangEnum::RU->value ? 'name_ru as name' : 'name_uz as name',
            $lang == LangEnum::RU->value ? 'description_ru as description' : 'description_uz as description',
            'category_id',
        ];

        $total = Product::count();
        $ids = Product::pluck('id')->toArray();

        $steppedIds = [];
        for ($i = 0; $i < $total; $i += $step) {
            $steppedIds[] = $ids[$i];
        }
        $randomIds = collect($steppedIds)->shuffle()->take(10)->toArray();

        $products = Product::with('category')->whereIn('id', $randomIds)
            ->get($columns);

        return ProductRandomResource::collection($products);
    }
    public function getProductItem(int $productItemId):ProductValue|null{
        return ProductValue::find($productItemId);
    }
    public function getProductById(int $productId): ?Product
    {
        return Product::find($productId)?->load('category');
    }

}
