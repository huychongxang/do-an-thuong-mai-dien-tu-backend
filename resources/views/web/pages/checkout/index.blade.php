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
            <div class="cart-collaterals space-40">
                <div class="row">
                    <div class="title-wrap col-sm-12">
                        <h2 class="section-title">
                                    <span>
                                        <span class="funky-font blue-tag">Order</span>
                                        <span class="italic-font">List</span>
                                    </span>
                        </h2>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="light-bg default-box-shadow">
                            <form class="cart-form">
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
                                            <td class="total"><strong> {{number_format($row->price) . ' VNĐ'}} </strong></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <div class="continue-shopping">
                                    <div class="shp-btn">
                                        <a class="blue-btn btn" href="#">Continue Shopping<i
                                                class="fa fa-caret-right"></i></a>
                                    </div>
                                    <div class="cart-sub-total">
                                        <span>Subtotal:</span>
                                        <strong class="pink-color">$700</strong>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="light-bg default-box-shadow cart_totals_wrap">
                            <div class="cart_totals_box">
                                <table class="cart_totals">
                                    <tr>
                                        <th>Subtotal:</th>
                                        <td><strong>$700</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Cost :</th>
                                        <td><strong>$20</strong></td>
                                    </tr>
                                    <tr class="cupon-off">
                                        <th>Cupon off :</th>
                                        <td><strong class="blue-color">-$50</strong></td>
                                    </tr>
                                    <tr class="grand-total">
                                        <th>Total :</th>
                                        <td><strong class="pink-color">$670</strong></td>
                                    </tr>
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
                                        <span class="funky-font blue-tag"> Delivery </span>
                                        <span class="italic-font">address</span>
                                    </span>
                        </h2>
                    </div>
                    <form action="#" class="form-delivery">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text"
                                                               placeholder="First Name"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Address 1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Address 2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group selectpicker-wrapper">
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%"
                                            data-toggle="tooltip" title="Country">
                                        <option>Country</option>
                                        <option>Country</option>
                                        <option>Country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group selectpicker-wrapper">
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%"
                                            data-toggle="tooltip" title="City">
                                        <option>City</option>
                                        <option>City</option>
                                        <option>City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"><input class="form-control" type="text"
                                                               placeholder="Postcode/ZIP"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"><input class="form-control" type="text"
                                                               placeholder="Phone Number"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><textarea class="form-control"
                                                                  placeholder="Addıtıonal Informatıon" name="name"
                                                                  cols="30" rows="10"></textarea></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="title-wrap space-bottom-20">
                        <h2 class="section-title">
                                    <span>
                                        <span class="funky-font pink-tag"> Deliver to </span>
                                        <span class="italic-font">different address</span>
                                    </span>
                        </h2>
                    </div>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input id="diff-address" type="checkbox"> Ship to a different address?
                        </label>
                    </div>
                    <form action="#" class="form-delivery-different">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text"
                                                               placeholder="First Name"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Address 1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Address 2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group selectpicker-wrapper">
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%"
                                            data-toggle="tooltip" title="Country">
                                        <option>Country</option>
                                        <option>Country</option>
                                        <option>Country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group selectpicker-wrapper">
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%"
                                            data-toggle="tooltip" title="City">
                                        <option>City</option>
                                        <option>City</option>
                                        <option>City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"><input class="form-control" type="text"
                                                               placeholder="Postcode/ZIP"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"><input class="form-control" type="text" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"><input class="form-control" type="text"
                                                               placeholder="Phone Number"></div>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <textarea class="form-control"
                                  placeholder="Notes about your order, e.g. special notes for delivery." name="name"
                                  cols="30" rows="7"></textarea>
                    </div>
                </div>
            </div>
            <div class="row space-top-20 margin-bottom-80">
                <div class="title-wrap space-bottom-25 col-sm-12">
                    <h2 class="section-title">
                                <span>
                                    <span class="funky-font blue-tag"> Payments  </span>
                                    <span class="italic-font">options</span>
                                </span>
                    </h2>
                </div>
                <div class="col-md-12">
                    <ul class="payments-options payment_methods methods">
                        <li class="payment_method_bacs">
                            <label id="direct-transfer" for="payment_method_bacs">
                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method"
                                       value="bacs" data-order_button_text=""/>
                                Direct Bank Transfer
                            </label><br>
                            <div class="direct-transfer-msg msg-box payment_box payment_method_bacs"
                                 style="display:none;">
                                <p>Make your payment directly into our bank account. Please use your Order ID as the
                                    payment reference. Your order won&#8217;t be shipped until the funds have cleared in
                                    our account.</p>
                            </div>
                        </li>
                        <li class="payment_method_cheque">
                            <label id="cheque-transfer" for="payment_method_cheque">
                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method"
                                       value="cheque" data-order_button_text=""/>
                                Cheque Payment
                            </label><br>
                            <div class="cheque-transfer-msg msg-box payment_box payment_method_cheque"
                                 style="display:none;">
                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State /
                                    County, Store Postcode.</p>
                            </div>
                        </li>
                        <li class="payment_method_paypal">
                            <label id="paypal-transfer" for="payment_method_paypal">
                                <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method"
                                       value="paypal" data-order_button_text="Proceed to PayPal"/>
                                PayPal <img
                                    src="../../../www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"
                                    alt="PayPal Acceptance Mark"/>
                                <a href="#" class="about_paypal" title="What is PayPal?">What is PayPal? </a>
                            </label><br>
                            <div class="paypal-transfer-msg payment_box msg-box payment_method_paypal"
                                 style="display:none;">
                                <p>Pay via PayPal; you can pay with your credit card if you don&#8217;t have a PayPal
                                    account.</p>
                            </div>
                        </li>
                    </ul>

                    <div class="form-row place-order">
                        <a class="blue-btn btn" href="index-2.html">Home Page</a>
                        <label class="green-btn btn">
                            <input type="submit" class="button alt " name="woocommerce_checkout_place_order"
                                   id="place_order" value="Place order" data-value="Place order"/>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Checkout  Ends -->
@endsection
