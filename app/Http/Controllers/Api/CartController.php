<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Cart\CartContentResource;
use App\Http\Resources\Api\Cart\CartResource;
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
            return ApiHelper::api_status_handle(200, [
                'sub_total' => $cart::subtotal(),
                'count' => $cart::count(),
                'content' => CartContentResource::collection(array_values($cart::content()->toArray()))
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
}
