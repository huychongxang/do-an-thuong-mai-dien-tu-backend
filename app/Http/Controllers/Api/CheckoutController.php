<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Checkout\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\PaymentStatus;
use App\Models\ProductAttributeGroup;
use App\Models\ShippingStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->cart = (new CartController())->getCart();
    }

    public function checkout(CheckoutRequest $request)
    {
        DB::beginTransaction();
        try {
            if($this->cart::count() == 0){
                throw new \Exception('Cart is Empty');
        }
            // Get data
            $user = auth()->user();
            $payment_method = $request->payment_method;
            $shipping_method = $request->shipping_method;
            $address1 = $request->address1 ?? $user->address1;
            $address2 = $request->address2 ?? $user->address2;
            $phone = $request->phone ?? $user->phone;
            $first_name = $request->first_name ?? $user->first_name;
            $last_name = $request->last_name ?? $user->last_name;
            $email = $request->email ?? $user->email;
            $comment = $request->comment;


            // Create Order
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->subtotal = $this->cart::subtotal();
            $order->shipping = 20000;
            $order->payment_status = $this->getIdUnPaidStatus();
            $order->shipping_status = $this->getIdNotShippingYetStatus();
            $order->status = $this->getIdNewOrderStatus();
            $order->total = $order->subtotal + $order->shipping;
            $order->first_name = $first_name;
            $order->last_name = $last_name;
            $order->address1 = $address1;
            $order->address2 = $address2;
            $order->phone = $phone;
            $order->email = $email;
            $order->comment = $comment;
            $order->payment_method = $payment_method;
            $order->shipping_method = $shipping_method;
            $order->balance = $order->total;
            $order->save();

            // Order Details
            $this->saveOrderDetail($order);

            //Remove cart
            $this->cart::destroy();
            $this->cart::store($user->id);
            DB::commit();
            return ApiHelper::api_status_handle(200, []);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }

    }

    private function saveOrderDetail(Order $order)
    {
        $orderDetails = [];
        foreach ($this->cart::content() as $row) {
            $newOptions = [];
            foreach ($row->options as $key => $value) {
                $id = ProductAttributeGroup::where('code', $key)->first()->id;
                $newOptions[$id] = $value;
            }
            $orderDetails[] = new OrderDetail([
                'product_id' => $row->id,
                'sku' => $row->model->sku,
                'name' => $row->name,
                'price' => $row->price,
                'quantity' => $row->qty,
                'total_price' => $row->qty * $row->price,
                'attribute' => json_encode($newOptions)
            ]);

        }
        $order->details()->saveMany($orderDetails);
    }

    private function getIdUnPaidStatus()
    {
        return PaymentStatus::where('name', 'unpaid')->select('id')->first()->id;
    }

    private function getIdNotShippingYetStatus()
    {
        return ShippingStatus::where('name', 'not_sent')->select('id')->first()->id;
    }

    private function getIdNewOrderStatus()
    {
        return OrderStatus::where('name', 'new')->select('id')->first()->id;
    }
}
