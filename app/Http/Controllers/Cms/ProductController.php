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
use App\Models\ProductPromotion;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories'])->latest()->paginate(10);
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
        $data = $request->all();
        if (isset($data['status']) && strtolower($data['status']) == 'on') {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        $newProduct = Product::create($data);
        if (!$newProduct) {
            alert()->error('Product Created Fail', 'Something went wrong!');
            return redirect()->back();
        }

        // Insert promotion price
        $this->insertPromotionPrice($request, $newProduct);

        // Sync categories for product
        $this->syncCategories($request, $newProduct);

        // Sync sub images for product
        $this->syncSubImages($request, $newProduct);

        //Insert attribute
        $this->insertAttributes($request, $newProduct);

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

    public function update(UpdateRequest $request, $id)
    {
        $product = Product::find($id);
        $data = request()->all();
        if (isset($data['status']) && strtolower($data['status']) == 'on') {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }

        if (!$product) {
            alert()->error('Product Created Fail', 'Something went wrong!');
            return redirect()->back();
        }
        $product->update($data);

        //Promoton price
        $product->promotionPrice()->delete();
        $this->insertPromotionPrice($request, $product);

        // Sync categories for product
        $this->syncCategories($request, $product);

        //Insert new attribute
        $product->attributes()->delete();
        $this->insertAttributes($request, $product);

        // Sync sub images for product
        $product->images()->delete();
        $this->syncSubImages($request, $product);

        alert()->success('Post Updated', 'Successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $product = Product::whereId($id)->first()->delete();
        if ($product) {
            alert()->success('Product Deleted', 'Successfully');
        } else {
            alert()->error('Product Deleted Fail', 'Something went wrong!');
        }
        return redirect()->back();
    }

    /**
     * @param UpdateRequest $request
     * @param $product
     */
    private function syncCategories($request, $product): void
    {
        $categories = $request->categories ?: [];
        $product->categories()->sync($categories);
    }

    /**
     * @param $newProduct
     */
    private function syncSubImages($request, $newProduct): void
    {
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
    }

    /**
     * @param $newProduct
     */
    private function insertAttributes($request, $newProduct): void
    {
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
    }

    /**
     * @param $product
     */
    private function insertPromotionPrice($request, $product)
    {
        if ($request->price_promotion) {
            $promotion = new ProductPromotion([
                'price_promotion' => $request->price_promotion,
                'date_start' => ($request->price_promotion_start) ?? null,
                'date_end' => ($request->price_promotion_end) ?? null
            ]);
            $product->promotionPrice()->save($promotion);
        }
    }
}
