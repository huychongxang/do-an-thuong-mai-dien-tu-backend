<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\ProductAttributeGroup\StoreRequest;
use App\Http\Requests\Cms\ProductAttributeGroup\UpdateRequest;
use App\Models\ProductAttributeGroup;
use Illuminate\Http\Request;

class ProductAttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = ProductAttributeGroup::paginate(10);
        return view('admin.pages.product-attribute-group.list', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product-attribute-group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $newAttribute = ProductAttributeGroup::create($request->all());
        if ($newAttribute) {
            alert()->success('Tạo thuộc tính', 'Thành công');
        } else {
            alert()->error('Tạo thuộc tính', 'Thất bại!');
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
        $attribute = ProductAttributeGroup::whereId($id)->first();
        return view('admin.pages.product-attribute-group.edit', compact('attribute'));
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
        $attribute = ProductAttributeGroup::whereId($id)->first();
        $attribute->update($request->all());
        if ($attribute) {
            alert()->success('Cập nhật thuộc tính', 'Thành công');
        } else {
            alert()->error('Cập nhật thuộc tính', 'Thất bại!');
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
        $destroy = ProductAttributeGroup::whereId($id)->first()->delete();
        if ($destroy) {
            alert()->success('Xóa thuộc tính', 'Thành công');
        } else {
            alert()->error('Xóa thuộc tính', 'Thất bại!');
        }
        return redirect()->back();
    }
}
