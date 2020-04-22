<?php

namespace App\Http\Controllers\Cms;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderHistory;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductAttributeGroup;
use App\Models\ShippingStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $histories = $order->histories()->with(['admin', 'user'])->latest()->get();
        $rowProductTemplate = $this->getRowProductTemplate();
        $attributesGroup = ProductAttributeGroup::pluck('name', 'id')->all();
        if (!$order) {
            alert()->error('Order not found', 'Something went wrong!');
            return redirect()->back();
        }

        return view('admin.pages.orders.edit', compact('order', 'statusOrderMap', 'statusShippingMap', 'histories', 'rowProductTemplate',
            'attributesGroup'));
    }

    private function getRowProductTemplate()
    {
        $products = Product::all();
        $html = "<tr>";
        $html .= "<td>";
        $html .= "<select onChange=\"selectProduct($(this));\" class=\"add_id form-control select2\" style=\"width:100% !important;\" name=\"add_ids[]\">";
        $html .= " <option value=\"0\">Vui lòng chọn sản phẩm</option>";
        foreach ($products as $product) {
            $html .= "<option  value=\"{$product->id}\" >{$product->name}</option>";
        }
        $html .= "</select>";
        $html .= "<span class=\"add_attr\"></span>";
        $html .= "</td>";
        $html .= "<td><input type=\"text\" disabled class=\"add_sku form-control\"  value=\"\"></td>";
        $html .= "<td><input onChange=\"update_total($(this));\" type=\"number\" min=\"0\" class=\"add_price form-control\" name=\"add_price[]\" value=\"0\"></td>";
        $html .= "<td><input onChange=\"update_total($(this));\" type=\"number\" min=\"0\" class=\"add_qty form-control\" name=\"add_qty[]\" value=\"0\"></td>";
        $html .= "<td><input type=\"number\" disabled class=\"add_total form-control\" value=\"0\"></td>";
        $html .= "<td><button onClick=\"$(this).parent().parent().remove();\" class=\"btn btn-danger btn-md btn-flat\" data-title=\"Delete\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></button></td>";
        $html .= "</tr>";
        return $html;
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


            $arrayFields = [
                $field => $value,
            ];

            $order = Order::find($id);
            $oldValue = $order->{$field};
            $order->update($arrayFields);

            //Add history
            $content = "Thay đổi <b>{$field}</b> từ <span style=\"color:blue\">'{$oldValue}'</span> sang <span style=\"color:red\">'{$value}'</span>";
            $history = new OrderHistory([
                'content' => $content,
                'admin_id' => Auth::guard('admin')->user()->id,
                'order_status_id' => $order->status,
            ]);

            $order->histories()->save($history);


            return ApiHelper::api_status_handle(200, [
                'total' => $order->total,
                'subtotal' => $order->subtotal,
                'shipping' => $order->shipping,
                'discount' => $order->discount,
                'received' => $order->received,
                'balance' => $order->balance,
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function updatePrice(Request $request, $id)
    {
        try {
            $field = $request->name;
            $value = $request->value;

            $order = Order::find($id);
            $oldValue = $order->{$field};
            $arrayFields = [
                $field => $value,
            ];
            $order->update($arrayFields);

            $order->total = $order->subtotal + $order->shipping - $order->discount;
            $order->balance = $order->total - $order->received;
            $order->save();

            //Add history
            $content = "Thay đổi <b>{$field}</b> từ <span style=\"color:blue\">'{$oldValue}'</span> sang <span style=\"color:red\">'{$value}'</span>";
            $history = new OrderHistory([
                'content' => $content,
                'admin_id' => Auth::guard('admin')->user()->id,
                'order_status_id' => $order->status,
            ]);

            $order->histories()->save($history);

            return ApiHelper::api_status_handle(200, [
                'total' => $order->total,
                'subtotal' => $order->subtotal,
                'shipping' => $order->shipping,
                'discount' => $order->discount,
                'received' => $order->received,
                'balance' => $order->balance,
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, ['error' => $e->getMessage()]);
        }
    }

    public function editItem(Request $request, $orderId, $itemId)
    {
        try {
            $field = $request->name;
            $value = $request->value;

            $order = Order::find($orderId);
            $item = OrderDetail::find($itemId);
            $oldValue = $item->{$field};

            $item->{$field} = $value;
            $item->total_price = $value * (($field == 'quantity') ? $item->price : $item->quantity);
            $item->save();
            $item->fresh();
            //Add history
            $history = [
                'order_id' => $orderId,
                'content' => 'Thay đổi' . '#' . $itemId . ': ' . $field . ' từ ' . $oldValue . ' -> ' . $value,
                'admin_id' => Auth::guard('admin')->user()->id,
                'order_status_id' => $order->status,
            ];

            $order->histories()->create($history);

            //Update total price
            $subtotal = OrderDetail::select(DB::raw('sum(total_price) as subtotal'))
                ->where('order_id', $order->id)
                ->first()->subtotal;
            Order::updateSubTotal($order->id, $subtotal);
            //end update total price
            $order->refresh();


            return ApiHelper::api_status_handle(200, [
                'item_id' => $item->id,
                'total_price' => $item->total_price,
                'total' => $order->total,
                'subtotal' => $order->subtotal,
                'shipping' => $order->shipping,
                'discount' => $order->discount,
                'received' => $order->received,
                'balance' => $order->balance,
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, ['error' => $e->getMessage()]);
        }
    }

    public function getProductInfo(Request $request)
    {
        return $request->all();
        try {
            $product = Product::findOrFail($request->id);
            return ApiHelper::api_status_handle(200, [
                'product' => $product]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(404, [], false);
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

    public function addItem(Request $request, $orderId)
    {
        try {
            $data = $request->all();
            $add_ids = $request->add_ids;
            $add_price = $request->add_price;
            $add_qty = $request->add_qty;
            $add_att = $request->add_att;

            $order = Order::find($orderId);
            $items = [];
            foreach ($add_ids as $key => $idProduct) {
                //where exits id and qty > 0
                if ($idProduct && $add_qty[$key]) {
                    $product = Product::find($idProduct);
                    $attDetails = $product->attributes->pluck('value', 'id')->all();
                    $pAttr = json_encode($add_att[$idProduct] ?? []);
                    $items[] = array(
                        'order_id' => $orderId,
                        'product_id' => $idProduct,
                        'name' => $product->name,
                        'quantity' => $add_qty[$key],
                        'price' => $add_price[$key],
                        'total_price' => $add_price[$key] * $add_qty[$key],
                        'sku' => $product->sku,
                        'attribute' => $pAttr,
                    );
                }
            }

            if ($items) {
                $order->detail()->createMany($items);
                //Add history
                $history = [
                    'order_id' => $order->id,
                    'content' => "Thêm sản phẩm: <br>" . implode("<br>", array_column($items, 'name')),
                    'admin_id' => Auth::guard('admin')->user()->id,
                    'order_status_id' => $order->status,
                ];
                $order->histories()->create($history);

                //Update total price
                $subtotal = OrderDetail::select(DB::raw('sum(total_price) as subtotal'))
                    ->where('order_id', $order->id)
                    ->first()->subtotal;
                $updateSubTotal = Order::updateSubTotal($order->id, $subtotal);
            }
            return ApiHelper::api_status_handle(200, []);

        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(200, [], false);
        }
    }

    public function deleteItem(Request $request, $orderId)
    {
        try {
            $itemId = $request->itemId;

            $item = OrderDetail::findOrFail($itemId);
            $order = Order::findOrFail($orderId);

            $item->delete();

            //Update total price
            $subtotal = OrderDetail::select(DB::raw('sum(total_price) as subtotal'))
                ->where('order_id', $order->id)
                ->first()->subtotal;
            Order::updateSubTotal($order->id, empty($subtotal) ? 0 : $subtotal);

            //Add history
            $history = [
                'order_id' => $order->id,
                'content' => 'Xóa sản phẩm ID#' . $itemId,
                'admin_id' => Auth::guard('admin')->user()->id,
                'order_status_id' => $order->status,
            ];
            $order->histories()->create($history);
            return ApiHelper::api_status_handle(200, []);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [], false);
        }
    }
}
