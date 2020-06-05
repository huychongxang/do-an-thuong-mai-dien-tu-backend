<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Category\CategoriesResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $limit = 10;

    public function index()
    {
        try {
            $categories = ProductCategory::paginate($this->limit);
            $resource = CategoriesResource::collection($categories);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, ['message' => $e->getMessage()], false);
        }
    }
}
