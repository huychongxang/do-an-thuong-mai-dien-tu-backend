<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductCategory\ProductCategoryHomePage;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $object = [
                'categories' => $this->getListProductCategories(),
                'featured_products' => $this->getFeaturedProducts(),
                'selling_product' => $this->getSellingProducts(),
            ];
            return ApiHelper::api_status_handle(200, $object);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [], false);
        }
    }

    private function getListProductCategories()
    {
        $categories = ProductCategory::active()->take(10)->get();
        return ProductCategoryHomePage::collection($categories);
    }

    private function getFeaturedProducts()
    {
        $products = Product::active()->featured()->take(10)->get();
        return $products;
    }

    private function getSellingProducts()
    {
        $products = Product::active()->orderBy('sold', 'DESC')->take(10)->get();
        return $products;
    }
}
