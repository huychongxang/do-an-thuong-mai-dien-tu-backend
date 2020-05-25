<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Product\SingleProduct;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

    }

    public function show($sku)
    {
        $product = Product::where('sku', $sku)->first();
        $product->load(['attributeGroups.attributeDetails' => function ($q) use ($product) {
            $q->where('product_id', $product->id);
        }]);
        return view('web.pages.product.single-product', compact('product'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        $qty = $request->qty;
        $options = $request->options;
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->getFinalPrice(),
            'options' => $options,
        ])->associate(Product::class);
        Cart::store(auth()->user()->id);
        return redirect()->back();
    }
}
