<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductValue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderItems = OrderItem::with(['product', 'order'])->get();

        $product_values = ProductValue::get();

        $orders = Order::get();

        return view('admin.orderItems.index', compact('orderItems', 'orders', 'product_values'));
    }

    public function show(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderItem->load('product', 'order');

        return view('admin.orderItems.show', compact('orderItem'));
    }
}
