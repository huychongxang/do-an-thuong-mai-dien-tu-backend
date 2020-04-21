<?php

namespace App\Http\Controllers\Cms;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\ShippingStatus;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['orderStatus'])->latest()->paginate(10);
        return view('admin.pages.orders.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $orderStatues = OrderStatus::all();
        return view('admin.pages.orders.create', compact('users', 'orderStatues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = null;
        if ($request->user_id) {
            $user = User::find($request->user_id);
        }
        $dataInsert = [
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'status' => $request->status,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'shipping_method' => $request->shipping_method,
            'email' => ($user) ? $user->email : $request->email,
            'comment' => $request->comment
        ];

        $order = Order::create($dataInsert);
        if (!$order) {
            alert()->error('Create Order Fail', 'Something went wrong!');
            return redirect()->back();
        }

        alert()->success('Order Created', 'Successfully');
        return redirect()->route(env('ADMIN_PATH') . '.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $statusOrderMap = OrderStatus::pluck('label', 'id')->all();
        $statusShippingMap = ShippingStatus::pluck('label', 'id')->all();
        if (!$order) {
            alert()->error('Order not found', 'Something went wrong!');
            return redirect()->back();
        }

        return view('admin.pages.orders.edit', compact('order', 'statusOrderMap', 'statusShippingMap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $field = $request->name;
            $value = $request->value;

            if ($field == 'shipping' || $field == 'discount' || $field == 'received') {
                $order = Order::find($id);
                $arrayFields = [
                    $field => $value,
                ];
                $order->update($arrayFields);

                $order->total = $order->subtotal + $order->shipping - $order->discount;
                $order->balance = $order->total - $order->received;
                $order->save();
            } else {
                $arrayFields = [
                    $field => $value,
                ];

                $order = Order::find($id);
                $order->update($arrayFields);
            }


            return ApiHelper::api_status_handle(200, [

            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $delete = $order->delete();
        if ($delete) {
            alert()->success('Order Deleted', 'Successfully');
        } else {
            alert()->error('Order Delete Fail', 'Something went wrong!');
        }
        return redirect()->back();
    }
}
