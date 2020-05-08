<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

    }

    public function show($sku)
    {
        $product = Product::where('sku', $sku)->first();
        return view('web.pages.product.single-product', compact('product'));
    }
}
