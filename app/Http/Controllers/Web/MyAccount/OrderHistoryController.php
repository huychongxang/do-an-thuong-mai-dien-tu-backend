<?php

namespace App\Http\Controllers\Web\MyAccount;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders;
        return view('web.pages.my-account.orders-history.index', compact('orders'));
    }

    public function show(Request $request, $id)
    {
        $order = Order::find($id);
        $orderDetails = $order->details()->with(['product'])->get();
        return view('web.pages.my-account.orders-history.show', compact('order', 'orderDetails'));
    }
}
