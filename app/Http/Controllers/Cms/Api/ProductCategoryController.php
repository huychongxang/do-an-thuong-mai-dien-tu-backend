<?php

namespace App\Http\Controllers\Cms\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Yajra\DataTables\DataTables;

class ProductCategoryController extends Controller
{
    public function list()
    {
        $productCategories = ProductCategory::with(['parent']);
        return DataTables::of($productCategories)
            ->addColumn('parent_name', function ($productCategory) {
                // Ensure the user has a profile. Just a check (Optional)
                return optional($productCategory->parent)->name;
            })
            ->editColumn('status', function ($productCategory) {
                // Ensure the user has a profile. Just a check (Optional)
                if ($productCategory->status == 1) {
                    $html = '<div class="alert alert-success" role="alert">On</div>';
                } else {
                    $html = '<div class="alert alert-danger" role="alert">Off</div>';
                }
                return $html;
            })
            ->editColumn('image', function ($productCategory) {
                // Ensure the user has a profile. Just a check (Optional)
                if ($productCategory->image) {
                    $html = "<img height='50' width='50' src=\"{$productCategory->image}\" />";
                } else {
                    $html = "<img height='50' width='50' />";
                }
                return $html;
            })
            ->addColumn('action', function ($user) {
                return '<a class="btn btn-outline-success"><i class="fa fa-pen"></i> Edit</a> 
                <a class="btn btn-outline-danger"><i class="fa fa-times"></i> Delete</a>';
            })
            ->rawColumns(['status', 'image', 'action'])
            ->make(true);
    }
}
