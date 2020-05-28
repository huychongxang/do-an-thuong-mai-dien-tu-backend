@extends('web.layouts.master')
@section('content')
    @include('web.includes.breadcrumbs',[
   'title1'=>null,
   'title2'=>null,
   'title3'=>'Tài khoản',
   'parent'=>[],
   'current'=>'Tài khoản'
   ])

    <article class="container theme-container">
        <div class="row">
            <!-- Sidebar Start -->
        @include('web.pages.my-account.sidebar')
        <!-- / Sidebar Ends -->
            <aside class="col-md-8 col-sm-8 space-bottom-45">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header with-border">
                                <h3 class="card-title">Chi tiết đơn hàng #{{$order->id}}</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>Tên:</td>
                                            <td>
                                                <a> {{$order->first_name}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Họ:</td>
                                            <td><a> {{$order->last_name}}</a></td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại:</td>
                                            <td>
                                                <a> {{$order->phone}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{$order->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tỉnh/Thành:</td>
                                            <td>
                                                <a> {{$order->address1}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Quận/Huyện:</td>
                                            <td>
                                                <a> {{$order->address2}}</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>Trạng thái đơn hàng:</td>
                                            <td>
                                                <a>
                                                    {{$order->orderStatus->label}}</a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trạng thái vận chuyển:</td>
                                            <td>
                                                <a>{{$order->shippingStatus->label}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Vận chuyển:</td>
                                            <td>{{$order->shippingMethod->label}}</td>
                                        </tr>
                                        <tr>
                                            <td>Thanh toán:</td>
                                            <td>{{$order->paymentMethod->label}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tổng giá:</td>
                                            <td>{{number_format($order->subtotal) . ' VNĐ'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phí ship:</td>
                                            <td>{{number_format($order->shipping) . ' VNĐ'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tổng tiền:</td>
                                            <td>{{number_format($order->total) . ' VNĐ'}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-details-wrap">
                    <div class="light-bg default-box-shadow">
                        <table class="product-table">
                            <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Sku</th>
                                <th>Tên</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Tổng giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetails as $row)
                                <tr>
                                    <td class="image">
                                        <div class="white-bg cart-img">
                                            <a class="media-link" href="#"><img style="max-width: 50px"
                                                                                src="{{$row->product->image}}"
                                                                                alt=""></a>
                                        </div>
                                    </td>
                                    <td>{{$row->sku}}</td>
                                    <td class="description">
                                        <a href="#">{{$row->name}}</a>
                                        @foreach(json_decode($row->attribute) as $value)
                                            <p>{{$value}}</p>
                                        @endforeach
                                    </td>
                                    <td class="quantity">
                                        x{{$row->quantity}}
                                    </td>
                                    <td class="total"><strong> {{number_format($row->price) . ' VNĐ'}} </strong></td>
                                    <td class="total"><strong> {{number_format($row->total_price) . ' VNĐ'}} </strong>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
        </div>
    </article>
@endsection
