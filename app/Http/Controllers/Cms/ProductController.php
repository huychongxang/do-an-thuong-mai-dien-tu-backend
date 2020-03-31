<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories'])->paginate(10);
        return view('admin.pages.product.list', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::where('slug', '!=', 'root')->get();
        return view('admin.pages.product.create', compact('categories'));
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
