@extends('admin.layouts.master')
@section('title_page','Chi tiết đơn hàng')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH').'.orders.update',$order->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header with-border">
                                <h3 class="card-title">Chi tiết đơn hàng #{{$order->id}}</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Tên:</td>
                                            <td>{{$order->first_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Họ:</td>
                                            <td>{{$order->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại:</td>
                                            <td>{{$order->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{$order->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tỉnh/Thành:</td>
                                            <td>{{$order->address1}}</td>
                                        </tr>
                                        <tr>
                                            <td>Quận/Huyện:</td>
                                            <td>{{$order->address2}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Trạng thái đơn hàng:</td>
                                            <td>{{$order->orderStatus->label}}</td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái vận chuyển:</td>
                                            <td>{{$order->shippingStatus->label}}</td>
                                        </tr>
                                        <tr>
                                            <td>Vận chuyển:</td>
                                            <td>{{$order->shipping_method}}</td>
                                        </tr>
                                        <tr>
                                            <td>Thanh toán:</td>
                                            <td>{{$order->payment_method}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card collapsed-card">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Mã hàng</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Easy Polo Black Edition 1</td>
                                        <td>ABC</td>
                                        <td>5000</td>
                                        <td>
                                            X 1
                                        </td>
                                        <td>
                                            5000 đ
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr id="add-item" class="not-print">
                                        <td colspan="6">
                                            <button type="button" class="btn btn-sm btn-flat btn-success"
                                                    id="add-item-button"
                                            >
                                                <i class="fa fa-plus"></i>Thêm sản phẩm
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Tiền hàng:</td>
                                            <td>{{$order->subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phí ship:</td>
                                            <td>{{$order->shipping}}</td>
                                        </tr>
                                        <tr>
                                            <td>Discount:</td>
                                            <td>{{$order->discount}}</td>
                                        </tr>
                                        <tr style="background:#f5f3f3;font-weight: bold;">
                                            <td>Total:</td>
                                            <td style="text-align:right">{{$order->total}}</td>
                                        </tr>
                                        <tr>
                                            <td>Đã nhận: </td>
                                            <td>{{$order->received}}</td>
                                        </tr>
                                        <tr>
                                            <td>Còn lại:</td>
                                            <td>{{$order->balance}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                   <div class="card collapsed-card">
                                       <table class="table table-bordered">
                                           <tbody>
                                           <tr>
                                               <td class="td-title">Ghi chú đơn hàng:</td>
                                               <td>{{$order->comment}}</td>
                                           </tr>
                                           </tbody>
                                       </table>
                                   </div>
                                    <div class="card collapsed-card">
                                        <div class="card-header with-border">
                                            <h3 class="card-title">Lịch sử đơn hàng</h3>
                                            <div class="card-tools pull-right">
                                                <button type="button" class="btn btn-card-tool" data-widget="collapse">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive no-padding card-primary">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th>Nhân viên</th>
                                                    <th>Nội dung</th>
                                                    <th>Thời gian</th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

@endpush
