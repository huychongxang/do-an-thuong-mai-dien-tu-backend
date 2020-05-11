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
    public function index()
    {
        try {
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
}
