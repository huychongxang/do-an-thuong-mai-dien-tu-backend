<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\OrderStatus\StoreRequest;
use App\Http\Requests\Cms\OrderStatus\UpdateRequest;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderStatuses = OrderStatus::paginate(10);
        return view('admin.pages.order-status.list', compact('orderStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.order-status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $newOrderStatus = OrderStatus::create($request->all());
        if ($newOrderStatus) {
            alert()->success('Order Status Created', 'Successfully');
        } else {
            alert()->error('Order Status Created Fail', 'Something went wrong!');
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
        $orderStatus = OrderStatus::find($id);
        return view('admin.pages.order-status.edit', compact('orderStatus'));
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
        $orderStatus = OrderStatus::find($id)->update($request->all());
        if ($orderStatus) {
            alert()->success('Order Status Updated', 'Successfully');
        } else {
            alert()->error('Order Status Updated Fail', 'Something went wrong!');
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
        $orderStatus = OrderStatus::findOrFail($id);
        $delete = $orderStatus->delete();
        if ($delete) {
            alert()->success('Order Status Deleted', 'Successfully');
        } else {
            alert()->error('Order Status Deleted Fail', 'Something went wrong!');
        }
        return redirect()->back();
    }
}
