<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\Product\StoreRequest;
use App\Http\Requests\Cms\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeGroup;
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
        $attributeGroups = ProductAttributeGroup::getList();

        // html select attribute
        $htmlProductAtrribute = '<tr><td><br><input type="text" name="attribute[attribute_group][]" value="attribute_value" class="form-control input-sm" placeholder="Nhập giá trị" /></td><td><br><span title="Remove" class="btn btn-flat btn-sm btn-danger removeAttribute"><i class="fa fa-times"></i></span></td></tr>';
        //end select attribute

        return view('admin.pages.product.create', compact('categories', 'attributeGroups', 'htmlProductAtrribute'));
    }

    private function treeList()
    {
        return ProductCategory::orderBy('name', 'DESC')->get()->nest()->setIndent('--')->listsFlattened('name');
    }

    public function store(StoreRequest $request)
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
        if (!empty($subImages)) {
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
        }

        //Insert attribute
        $attribute = (array)$request->attribute;
        if (!empty($attribute)) {
            $arrDataAtt = [];
            foreach ($attribute as $group => $rowGroup) {
                if (count($rowGroup)) {
                    foreach ($rowGroup as $key => $nameAtt) {
                        if ($nameAtt) {
                            $arrDataAtt[] = new ProductAttribute(['value' => $nameAtt, 'attribute_group_id' => $group]);
                        }
                    }
                }
            }
            $newProduct->attributes()->saveMany($arrDataAtt);
        }

        alert()->success('Post Created', 'Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::whereId($id)->first();
        $categories = $this->treeList();
        $attributeGroups = ProductAttributeGroup::getList();

        // html select attribute
        $htmlProductAtrribute = '<tr><td><br><input type="text" name="attribute[attribute_group][]" value="attribute_value" class="form-control input-sm" placeholder="Nhập giá trị" /></td><td><br><span title="Remove" class="btn btn-flat btn-sm btn-danger removeAttribute"><i class="fa fa-times"></i></span></td></tr>';
        //end select attribute
        return view('admin.pages.product.edit', compact('product'
            , 'categories', 'attributeGroups', 'htmlProductAtrribute'));
    }

    public function update(UpdateRequest $request)
    {

    }

    public function destroy($id)
    {
        $product = Product::whereId($id)->delete();
        if ($product) {
            alert()->success('Product Deleted', 'Successfully');
        } else {
            alert()->error('Product Deleted Fail', 'Something went wrong!');
        }
        return redirect()->back();
    }
}
