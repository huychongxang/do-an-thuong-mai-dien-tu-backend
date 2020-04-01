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
        $productCategories = ProductCategory::with(['parent'])->paginate(10);
        return view('admin.pages.product-category.list', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = $this->treeList();
        return view('admin.pages.product-category.create', compact('parentCategories'));
    }

    private function treeList($id = null)
    {
        if ($id) {
            return ProductCategory::where('id', '!=', $id)->orderBy('name', 'DESC')->get()->nest()->setIndent('-')->listsFlattened('name');
        } else {
            return ProductCategory::orderBy('name', 'DESC')->get()->nest()->setIndent('-')->listsFlattened('name');
        }

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
        $parentCategories = $this->treeList($productCategory->id);
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
        try {
            DB::beginTransaction();
            $productCategory = ProductCategory::find($id);
            $rootCategory = ProductCategory::where('slug', 'root')->first();

            // Đổi parent của children category về 'Root'
            ProductCategory::where('parent_id', $productCategory->id)->update([
                'parent_id' => $rootCategory->id
            ]);

            $delete = $productCategory->delete();
            DB::commit();
            if ($delete) {
                alert()->success('Post Deleted', 'Successfully');
            } else {
                alert()->error('Post Deleted Fail', 'Something went wrong!');
            }
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
        }

    }
}
