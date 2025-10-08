<?php

namespace App\Http\Controllers\Api\V1;
use App\Enums\CategoryEnum;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{

    public function getProducts(Request $request, ProductService $productService)
    {
        try {
            $lang = $request->header('Accept-Language', 'en'); // по умолчанию en
            $perPage = $request->get('per_page', 10);
            $page = $request->get('page', 1);
            $category = $request->get('category', CategoryEnum::SCARVES->value);
            $products = $productService->getProducts($perPage, $page, $category, $lang);
            return response()->json($products);
        }catch (Throwable $th){
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function getProductVariantByProductId(int $id,Request $request, ProductService $productService)
    {
        $lang = $request->header('Accept-Language', 'en'); // по умолчанию en
        try {
            $variant = $productService->getVariantById($id, $lang);
            if (!$variant) {
                return response()->json($variant, 404);
            }
            return response()->json($variant);
        }catch (Throwable $th){
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function getRandomProducts(Request $request, ProductService $productService)
    {
        try {
            $lang = $request->header('Accept-Language', 'en');
            $products = $productService->getRandomProducts($lang);
            return response()->json($products);
        }catch (Throwable $th){
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    public function getRandomLatestProducts(Request $request, ProductService $productService)
    {
        try {
            $lang = $request->header('Accept-Language', 'en');
            $products = $productService->getRandomLatestProducts($lang);
            return response()->json($products);
        }catch (Throwable $th){
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    public function getRandomOffsetProducts(Request $request, ProductService $productService)
    {
        try {
            $lang = $request->header('Accept-Language', 'en');
            $products = $productService->getRandomOffsetProducts($lang);
            return response()->json($products);
        }catch (Throwable $th){
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    public function getRandomSteppedProducts(Request $request, ProductService $productService)
    {
        try {
            $lang = $request->header('Accept-Language', 'en');
            $products = $productService->getRandomSteppedProducts($lang);
            return response()->json($products);
        }catch (Throwable $th){
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
