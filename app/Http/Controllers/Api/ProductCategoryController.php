<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductCategory\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected $limit = 10;

    public function index()
    {
        try {
            $categories = ProductCategory::paginate($this->limit);
            $resource = ProductCategoryResource::collection($categories);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, ['message' => $e->getMessage()], false);
        }
    }
}
