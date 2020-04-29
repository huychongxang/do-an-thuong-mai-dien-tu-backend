<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\ProductCategory\EditRequest;
use App\Http\Requests\Cms\ProductCategory\StoreRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $productCategories = ProductCategory::paginate(10);
        return view('admin.pages.product-category.list', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product-category.create');
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
        $productCategory = ProductCategory::whereId($id)->first();
        return view('admin.pages.product-category.edit', compact('productCategory'));
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
        try {
            DB::beginTransaction();
            $productCategory = ProductCategory::find($id);

            $delete = $productCategory->delete();
            DB::commit();
            if ($delete) {
                alert()->success('Xóa danh mục', 'Thành công');
            } else {
                alert()->error('Xóa danh mục', 'Thất bại!');
            }
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
        }

    }
}
