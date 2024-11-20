<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        return view('admin.orders');
    }

    public function orderDetails(Order $order)
    {
        $items = $order->items;
        return view('admin.order-details', compact('order', 'items'));
    }
}
