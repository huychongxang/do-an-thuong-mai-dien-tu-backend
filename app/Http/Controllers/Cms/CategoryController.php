<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\Category\StoreRequest;
use App\Http\Requests\Cms\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with(['posts'])->paginate(10);
        return view('admin.pages.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $category = Category::create($request->all());
        if ($category) {
            alert()->success('Tạo danh mục', 'Thành công');
        } else {
            alert()->error('Tạo danh mục', 'Thất bại!');
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
        $category = Category::find($id);
        return view('admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $category = Category::find($id)->update($request->all());
        if ($category) {
            alert()->success('Cập nhật danh mục', 'Thành công');
        } else {
            alert()->error('Cập nhật danh mục', 'Thất bại!');
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
        $category = Category::findOrFail($id);
        $delete = $category->delete();
        if ($delete) {
            alert()->success('Xóa danh mục', 'Thành công');
        } else {
            alert()->error('Xóa danh mục', 'Thất bại!');
        }
        return redirect()->back();
    }
}
