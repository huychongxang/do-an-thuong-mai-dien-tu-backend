@extends('web.layouts.master')
@section('content')
    @include('web.includes.breadcrumbs',[
   'title1'=>null,
   'title2'=>null,
   'title3'=>'Checkout',
   'parent'=>[],
   'current'=>'Checkout'
   ])
    <!-- Checkout  Start -->
    <section id="checkout" class="checkout-wrap">
        <div class="theme-container container">
            <form class="cart-form" method="post" action="{{route('page.checkout.store')}}">
                @csrf
                <div class="cart-collaterals space-40">
                    <div class="row">
                        <div class="col-md-8 col-sm-7">
                            <div class="light-bg default-box-shadow">

                                <table class="product-table">
                                    <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Tổng giá</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::content() as $row)
                                        <tr>
                                            <td class="image">
                                                <div class="white-bg cart-img">
                                                    <a class="media-link" href="#"><img src="{{$row->model->image}}"
                                                                                        alt=""></a>
                                                </div>
                                            </td>
                                            <td class="description">
                                                <a href="#">{{$row->name}}</a>
                                                @foreach($row->options as $key=>$value)
                                                    <p>{{$value}}</p>
                                                @endforeach
                                            </td>
                                            <td class="quantity">
                                                <div class="quantity buttons-add-minus">
                                                    {{$row->qty}}
                                                </div>
                                            </td>
                                            <td class="total"><strong> {{number_format($row->price) . ' VNĐ'}} </strong>
                                            </td>
                                            <td class="total">
                                                <strong> {{number_format($row->price * $row->qty) . ' VNĐ'}} </strong>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <div class="continue-shopping">
                                    <div class="shp-btn">
                                        <a class="blue-btn btn" href="{{route('page.products')}}">Tiếp tục mua hàng<i
                                                class="fa fa-caret-right"></i></a>
                                    </div>
                                    <div class="cart-sub-total">
                                        <span>Tổng tiền:</span>
                                        <strong class="pink-color">{{number_format(Cart::subtotal()) . ' VNĐ'}}</strong>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5">
                            <div class="light-bg default-box-shadow cart_totals_wrap">
                                <div class="cart_totals_box">
                                    <table class="cart_totals">
                                        <tbody>
                                        <tr>
                                            <th>Tổng giá:</th>
                                            <td><strong>{{number_format(Cart::subtotal()) . ' VNĐ'}}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Phí ship :</th>
                                            <td><strong>{{$shippingCost}}</strong></td>
                                        </tr>
                                        <tr class="grand-total">
                                            <th>Tổng tiền :</th>
                                            <td><strong class="pink-color">{{$total_format}}</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row space-35">
                    <div class="col-md-6 col-sm-6">
                        <div class="title-wrap space-bottom-25">
                            <h2 class="section-title">
                                    <span>
                                        <span class="italic-font">Địa chỉ giao hàng</span>
                                    </span>
                            </h2>
                        </div>
                        <form action="#" class="form-delivery">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}"><input
                                            name="first_name" class="form-control" type="text"
                                            placeholder="Tên" value="{{$user->first_name}}">
                                        @if($errors->has('first_name'))
                                            <span class="help-block">{{$errors->first('first_name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}"><input
                                            name="last_name" class="form-control" type="text"
                                            placeholder="Họ đệm"
                                            value="{{$user->last_name}}">
                                        @if($errors->has('last_name'))
                                            <span class="help-block">{{$errors->first('last_name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('address1') ? 'has-error' : '' }}"><input
                                            name="address1" class="form-control" type="text"
                                            placeholder="Tỉnh/Thành"
                                            value="{{$user->address1}}">
                                        @if($errors->has('address1'))
                                            <span class="help-block">{{$errors->first('address1')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('address2') ? 'has-error' : '' }}"><input
                                            name="address2" class="form-control" type="text"
                                            placeholder="Quận/Huyện"
                                            value="{{$user->address2}}">
                                        @if($errors->has('address2'))
                                            <span class="help-block">{{$errors->first('address2')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}"><input
                                            name="email" class="form-control" type="email"
                                            placeholder="Email"
                                            value="{{$user->email}}">
                                        @if($errors->has('email'))
                                            <span class="help-block">{{$errors->first('email')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}"><input
                                            name="phone" class="form-control" type="text"
                                            placeholder="Điện thoại" value="{{$user->phone}}">
                                        @if($errors->has('phone'))
                                            <span class="help-block">{{$errors->first('phone')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}"><textarea
                                            class="form-control"
                                            placeholder="Ghi chú" name="comment"
                                            cols="30" rows="10"></textarea></div>
                                    @if($errors->has('comment'))
                                        <span class="help-block">{{$errors->first('comment')}}</span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="row space-top-20 margin-bottom-80">
                            <div class="title-wrap space-bottom-25 col-sm-12">
                                <h2 class="section-title">
                                <span>
                                    <span class="italic-font">Hình thức giao hàng</span>
                                </span>
                                </h2>
                            </div>
                            <div class="col-md-12">
                                <ul class="payments-options payment_methods methods">
                                    @foreach($shippingMethods as $key=>$shippingMethod)
                                        <li class="payment_method_bacs{{$shippingMethod->id}}">
                                            <label id="direct-transfer"
                                                   for="payment_method_bacs{{$shippingMethod->id}}">
                                                <input id="payment_method_bacs{{$shippingMethod->id}}" type="radio"
                                                       class="input-radio"
                                                       name="shipping_method" value="{{$shippingMethod->id}}"
                                                       {{($key == 0) ? 'checked': null}}
                                                       data-order_button_text=""
                                                >
                                                {{$shippingMethod->label}}
                                            </label><br>
                                            <div
                                                class="direct-transfer-msg msg-box payment_box payment_method_bacs{{$shippingMethod->id}}"
                                                style="display:none;">
                                                <p>{{$shippingMethod->description}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="row space-top-20 margin-bottom-80">
                            <div class="title-wrap space-bottom-25 col-sm-12">
                                <h2 class="section-title">
                                <span>
                                    <span class="italic-font">Hình thức thanh toán</span>
                                </span>
                                </h2>
                            </div>
                            <div class="col-md-12">
                                <ul class="shippings-options shipping_methods methods">
                                    @foreach($paymentMethods as $key=>$paymentMethod)
                                        <li class="shipping_method_bacs{{$paymentMethod->id}}">
                                            <label id="direct-transfer"
                                                   for="shipping_method_bacs{{$paymentMethod->id}}">
                                                <input id="shipping_method_bacs{{$paymentMethod->id}}" type="radio"
                                                       class="input-radio"
                                                       name="payment_method" value="{{$paymentMethod->id}}"
                                                       {{($key == 0) ? 'checked': null}}
                                                       data-order_button_text="">
                                                {{$paymentMethod->label}}
                                            </label><br>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="form-row place-order">
                                    <label class="green-btn btn">
                                        <input type="submit" class="button alt"
                                               id="place_order" value="Tạo đơn hàng" data-value="Tạo đơn hàng">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- / Checkout  Ends -->
@endsection
