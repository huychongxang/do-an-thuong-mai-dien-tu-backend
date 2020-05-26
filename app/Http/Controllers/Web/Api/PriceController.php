<?php

namespace App\Http\Controllers\Web\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    public function getRange()
    {
        try {
            $arr = [];
            $maxPrice = DB::table('products')->max('price');
            $minPrice = DB::table('products')->min('price');
            $minPromotion = DB::table('product_promotions')->min('price_promotion');
            $maxPromotion = DB::table('product_promotions')->max('price_promotion');
            $arr[] = $maxPrice;
            $arr[] = $minPrice;
            $arr[] = $minPromotion;
            $arr[] = $maxPromotion;

            $min = min($arr);
            $max = max($arr);
            return ApiHelper::api_status_handle(200, [
                'min' => $min,
                'max' => $max
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ]);
        }
    }
}
