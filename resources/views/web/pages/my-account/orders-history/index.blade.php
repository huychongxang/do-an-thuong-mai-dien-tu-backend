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
                <div class="account-details-wrap">
                    <div class="title-2 sub-title-small"> Your Order History</div>
                    <div class="light-bg default-box-shadow">
                        <table class="product-table">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Tổng tiền</th>
                                <th>Ngày tạo đơn</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="order-id">#{{$order->id}}</td>
                                    <td class="total"><strong> {{number_format($order->total). ' VNĐ'}} </strong></td>
                                    <td class="total"><strong> {{$order->created_at->format('d-m-Y H:i')}} </strong>
                                    </td>
                                    <td class="order-status">
                                        <a class="blue-btn btn" href="{{route('page.orders-history.show',$order->id)}}">Chi
                                            tiết</a>
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
