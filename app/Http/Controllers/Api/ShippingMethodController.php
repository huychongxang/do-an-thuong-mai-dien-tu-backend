<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ShippingMethod\ShippingMethodResource;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function list(Request $request)
    {
        try {
            $methods = ShippingMethod::all();
            $resource = ShippingMethodResource::collection($methods);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }
}
