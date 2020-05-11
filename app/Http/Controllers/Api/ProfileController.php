<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Profile\ProfileResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        try {
            $user = auth('api')->user();
            $resource = ProfileResource::make($user);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [], false);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = auth('api')->user();
            $user->update($request->only(['first_name', 'last_name', 'phone', 'address1', 'address2']));
            $resource = ProfileResource::make($user);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [], false);
        }
    }
}
