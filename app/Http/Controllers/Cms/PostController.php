<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\Post\StoreRequest;
use App\Models\Category;
use App\Models\News;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $limit = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $onlyTrashed = false;
        $posts = Post::with('author', 'category')
            ->latest()
            ->paginate($this->limit);

        if (($status = $request->get('status')) && $status == 'published') {
            $posts = Post::published()->with('author', 'category')
                ->latest()
                ->paginate($this->limit);
        }
        if (($status = $request->get('status')) && $status == 'scheduled') {
            $posts = Post::scheduled()->with('author', 'category')
                ->latest()
                ->paginate($this->limit);
        }
        if (($status = $request->get('status')) && $status == 'draft') {
            $posts = Post::draft()->with('author', 'category')
                ->latest()
                ->paginate($this->limit);
        }
        if (($status = $request->get('status')) && $status == 'own') {
            $posts = $request->user()->posts()->with('author', 'category')
                ->latest()
                ->paginate($this->limit);
        }
        $statusList = $this->statusList($request);
        return view('admin.pages.post.list', compact('posts', 'statusList'));
    }


    private function statusList($request)
    {
        return [
            'own' => $request->user()->posts()->count(),
            'all' => Post::count(),
            'published' => Post::published()->count(),
            'scheduled' => Post::scheduled()->count(),
            'draft' => Post::draft()->count(),
            'trash' => Post::onlyTrashed()->count()
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.pages.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $data['admin_id'] = $request->user()->id;
        $post = Post::create($data);
        if ($post) {
            alert()->success('Tạo bài viết', 'Thành công');
        } else {
            alert()->error('Tạo bài viết', 'Thất bại!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.pages.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['admin_id'] = $request->user()->id;
        $post = Post::find($id);
        $update = $post->update($data);
        if ($update) {
            alert()->success('Cập nhật bài viết', 'Thành công');
        } else {
            alert()->error('Cập nhật bài viết', 'Thất bại!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
