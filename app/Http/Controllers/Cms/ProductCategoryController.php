<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\ProductCategory\EditRequest;
use App\Http\Requests\Cms\ProductCategory\StoreRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.product-category.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = ProductCategory::pluck('name', 'id');
        return view('admin.pages.product-category.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $newProductCategory = ProductCategory::create($request->all());
        if ($newProductCategory) {
            alert()->success('Post Created', 'Successfully');
        } else {
            alert()->error('Post Created Fail', 'Something went wrong!');
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
        $productCategory = ProductCategory::whereId($id)->first();
        $parentCategories = ProductCategory::where('id', '!=', $id)->pluck('name', 'id');
        return view('admin.pages.product-category.edit', compact('productCategory', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $newProductCategory = ProductCategory::find($id)->update($request->all());
        if ($newProductCategory) {
            alert()->success('Post Updated', 'Successfully');
        } else {
            alert()->error('Post Updated Fail', 'Something went wrong!');
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
