<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $limit = 1;

    public function index()
    {
        $posts = Post::with('author', 'category')
            ->published()
            ->filter(request()->only(['term', 'month', 'year','category_id']))
            ->paginate($this->limit);
        return view('web.pages.posts.index', compact('posts'));
    }

    public function show(Request $request, $slug)
    {

    }
}
