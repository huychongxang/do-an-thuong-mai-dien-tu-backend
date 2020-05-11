<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Category\PostsResource;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $limit = 10;

    public function getPostsByCategoryId(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            $posts = $category->posts()->published()->with(['category', 'author'])->paginate($this->limit);
            $resource = PostsResource::collection($posts);
            return ApiHelper::api_resource_handle($resource, 200, [
                'success' => true
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, ['message' => $e->getMessage()], false);
        }
    }
}
