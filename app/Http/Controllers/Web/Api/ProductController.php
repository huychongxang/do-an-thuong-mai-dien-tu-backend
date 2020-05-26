<?php

namespace App\Http\Controllers\Web\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\WebApi\Product\ListProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use function foo\func;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $categories = $request->categories ?? [];
            $limit = $request->limit ?? 10;

            $products = Product::when($categories,function($query) use ($categories){
                $query->whereHas('categories', function ($q) use ($categories) {
                    $q->whereIn('category_id', $categories);
                });
            })->with(['promotionPrice','images'])->paginate($limit);

            $resource = ListProduct::collection($products);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ]);
        }
    }
}
