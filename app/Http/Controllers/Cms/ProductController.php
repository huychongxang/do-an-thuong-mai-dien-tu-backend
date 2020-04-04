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
        $categories = $this->treeList();
        return view('admin.pages.product.create', compact('categories'));
    }

    private function treeList()
    {
        return ProductCategory::orderBy('name', 'DESC')->get()->nest()->setIndent('--')->listsFlattened('name');
    }

    public function store(Request $request)
    {
        $newProduct = Product::create($request->all());

        // Sync categories for product
        if ($newProduct) {
            $categories = $request->categories ?: [];
            $newProduct->categories()->sync($categories);
        }
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
