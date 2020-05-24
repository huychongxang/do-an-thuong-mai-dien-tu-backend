<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Orders\OrderDetailsResource;
use App\Http\Resources\Api\Orders\OrdersResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list(Request $request)
    {
        try {
            $user = auth()->user();
            $orders = $user->orders;
            $resource = OrdersResource::collection($orders);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }

    public function detail(Request $request, $id)
    {
        try {
            $order = Order::find($id);
            $details = $order->details()->with('product')->get();
            $resource = OrderDetailsResource::collection($details);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }
}
