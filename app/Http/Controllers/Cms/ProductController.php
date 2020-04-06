<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
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
        if (!$newProduct) {
            alert()->error('Product Created Fail', 'Something went wrong!');
            return redirect()->back();
        }

        // Sync categories for product
        $categories = $request->categories ?: [];
        $newProduct->categories()->sync($categories);

        // Sync sub images for product
        $subImages = $request->get('sub_image');
        $subImagesToSave = [];
        foreach ($subImages as $subImage) {
            if ($subImage) {
                $image = new ProductImage([
                    'image' => $subImage,
                ]);
                $subImagesToSave[] = $image;
            }
        }
        $newProduct->images()->saveMany($subImagesToSave);

        alert()->success('Post Created', 'Successfully');
        return redirect()->back();
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
