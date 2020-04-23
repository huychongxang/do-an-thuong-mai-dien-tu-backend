<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\ShippingStatus\StoreRequest;
use App\Http\Requests\Cms\ShippingStatus\UpdateRequest;
use App\Models\ShippingStatus;
use Illuminate\Http\Request;

class ShippingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingStatuses = ShippingStatus::paginate(10);
        return view('admin.pages.shipping-status.list', compact('shippingStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.shipping-status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $newShippingStatus = ShippingStatus::create($request->all());
        if ($newShippingStatus) {
            alert()->success('Tạo mới trạng thái shipping', 'Thành công');
        } else {
            alert()->error('Tạo mới trạng thái shipping', 'Thất bại');
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
        $shippingStatus = ShippingStatus::find($id);
        return view('admin.pages.shipping-status.edit', compact('shippingStatus'));
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
        $shippingStatus = ShippingStatus::find($id)->update($request->all());
        if ($shippingStatus) {
            alert()->success('Cập nhật trạng thái shipping', 'Thành công');
        } else {
            alert()->error('Cập nhật trạng thại shipping', 'Thất bại!');
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
        $shippingStatus = ShippingStatus::findOrFail($id);
        $delete = $shippingStatus->delete();
        if ($delete) {
            alert()->success('Xóa trạng thái shipping', 'Thành công');
        } else {
            alert()->error('Xóa trạng thái shipping', 'Thất bại!');
        }
        return redirect()->back();
    }
}
