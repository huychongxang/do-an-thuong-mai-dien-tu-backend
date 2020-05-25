<?php

namespace App\Http\Controllers\Web\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\WebApi\ProductCategory\ListProductCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(){
        try {
            $categories = ProductCategory::withCount('products')->get();

            $resource = ListProductCategory::collection($categories);
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
