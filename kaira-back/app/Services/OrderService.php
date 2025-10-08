<?php

namespace App\Services;

use App\Dto\OrderDto;
use App\Dto\OrderItemDto;
use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderItem;



class OrderService
{
    public function createOrder(OrderDto $order):Order
    {
       return Order::create([
           'total_amount' => $order->totalAmount,
           'status' => OrderStatus::NEW->value,
           'phone' => $order->phone,
       ]);
    }

    public function createOrderItem(OrderItemDto $itemDto, Order $order)
    {
        OrderItem::create([
            'product_id' => $itemDto->productId,
            'quantity' => $itemDto->quantity,
            'code' => $itemDto->code,
            'order_id' =>$order->id,
        ]);
    }

}
