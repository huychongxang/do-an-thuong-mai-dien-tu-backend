<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\PaymentStatus\StoreRequest;
use App\Http\Requests\Cms\PaymentStatus\UpdateRequest;
use App\Models\PaymentStatus;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentStatuses = PaymentStatus::paginate(10);
        return view('admin.pages.payment-status.list', compact('paymentStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.payment-status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $newPaymentStatus = PaymentStatus::create($request->all());
        if ($newPaymentStatus) {
            alert()->success('Tạo trạng thái thanh toán', 'Thành công');
        } else {
            alert()->error('Tạo trạng thái thanh toán', 'Thất bại!');
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
        $paymentStatus = PaymentStatus::find($id);
        return view('admin.pages.payment-status.edit', compact('paymentStatus'));
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
        $paymentStatus = PaymentStatus::find($id)->update($request->all());
        if ($paymentStatus) {
            alert()->success('Cập nhật trạng thái thanh toán', 'Thành công');
        } else {
            alert()->error('Cập nhật trạng thái thanh toán', 'Thất bại!');
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
        $paymentStatus = PaymentStatus::findOrFail($id);
        $delete = $paymentStatus->delete();
        if ($delete) {
            alert()->success('Xóa trạng thái thanh toán', 'Thành công');
        } else {
            alert()->error('Xóa trạng thái thanh toán', 'Thất bại');
        }
        return redirect()->back();
    }
}
