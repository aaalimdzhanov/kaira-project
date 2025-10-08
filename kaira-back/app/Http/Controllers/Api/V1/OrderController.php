<?php

namespace App\Http\Controllers\Api\V1;
use App\Dto\OrderDto;
use App\Dto\OrderItemDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Support\Arr;
use Throwable;

class OrderController extends Controller
{

    public function createOrder(OrderRequest $request, ProductService $productService, OrderService $orderService)
    {
        try {
            $validated = $request->validated();
            $phone = Arr::get($validated, 'phone');
            $orderCollections = collect();
            foreach ($validated['items'] as $item) {
                $productValue = $productService->getProductItem(Arr::get($item, 'id'));
                if($productValue){
                    $orderItem = new OrderItemDto(
                        productItemId: Arr::get($item, 'id'),
                        quantity: Arr::get($item, 'qty'),
                        giftWrap: Arr::get($item, 'giftWrap',false),
                        productId: (int)$productValue->product_ids_id,
                        price: $productValue->price,
                        code: $productValue->code
                    );
                    $orderCollections->push($orderItem);
                }
            }
            if(!$orderCollections->isEmpty()){
                $totalPrice = $orderCollections->sum(fn($item) => $item->price * $item->quantity);
                $order = $orderService->createOrder(new OrderDto($phone, $totalPrice));
                foreach ($orderCollections as $item) {
                    $orderService->createOrderItem($item, $order);
                }
            }
            return response()->json();
        }catch (Throwable $th){
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

}
