<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Product\ListProduct;
use App\Http\Resources\Api\Product\SingleProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $limit = 10;

    public function getProductsByCategoryId($id)
    {
        try {
            $category = ProductCategory::find($id);
            $products = $category->products(['with' => ['promotionPrice']])->paginate($this->limit);
            $resource = ListProduct::collection($products);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [], false);
        }
    }

    public function getById(Request $request, $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            $resource = SingleProduct::make($product);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, ['message' => $e->getMessage()], false);
        }

    }
}
