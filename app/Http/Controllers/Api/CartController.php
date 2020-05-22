<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cart\AddCartRequest;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->initialCart();
        $this->cart = Cart::class;
    }

    private function initialCart()
    {
        Cart::restore(auth('api')->user()->id);
        if (Cart::count() > 0) {
            foreach (Cart::content() as $rowId => $row) {
                $product = Product::find($row->id);
                Cart::update($rowId, [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->getFinalPrice(),
                ]);
            }
            Cart::store(\auth('api')->user()->id);
        }
    }

    public function index()
    {
        try {
            $cart = Cart::class;
            $content = [];
            foreach ($cart::content() as $row) {
                $content[] = [
                    'row_id' => $row->rowId,
                    'product_id' => $row->id,
                    'name' => $row->name,
                    'qty' => $row->qty,
                    'price' => $row->price,
                    'options' => $row->options,
                    'sub_total' => $row->qty * $row->price,
                    'image' => $row->model->image
                ];
            }
            return ApiHelper::api_status_handle(200, [
                'sub_total' => $cart::subtotal(),
                'count' => $cart::count(),
                'content' => $content
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }

    public function update(Request $request)
    {
        try {
            $rowId = $request->row_id;
            $new_qty = $request->new_qty;
            $currentRow = $this->cart::get($rowId);
            if ($currentRow) {
                $product = Product::find($currentRow->id);
                if ($new_qty > 0) {
                    Cart::update($rowId, [
                        'name' => $product->name,
                        'qty' => $new_qty,
                        'price' => $product->getFinalPrice()
                    ])->associate(Product::class);
                } else {
                    Cart::remove($rowId);
                }
            }
            Cart::store(auth()->user()->id);
            return ApiHelper::api_status_handle(200, [
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }

    public function add(AddCartRequest $request)
    {
        try {
            $id = $request->product_id;
            $qty = $request->qty ?: 1;
            $product = Product::find($id);
            $options = $request->options;

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $qty,
                'price' => $product->getFinalPrice(),
                'options' => $options,
            ])->associate(Product::class);
            Cart::store(auth()->user()->id);

            return ApiHelper::api_status_handle(200, [
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }
}
