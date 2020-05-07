<div class="header-cart col-md-3  col-sm-4">
    <div class="cart-wrapper">
        <a href="javascript:void(0)" class="btn cart-btn default-btn">
            <i class="fa fa-shopping-cart blue-color"></i>
            <span><b> Giỏ hàng: </b></span> <span
                class="blue-color"> <strong> ({{$cart::count()}}) </strong> </span>
            <span class="fa fa-caret-down"></span>
        </a>
    </div>
    <div class="cart-dropdown bg2-with-mask">
        <span class="blue-color-mask blue-box-shadow color-mask-radius"></span>
        <div class="pos-relative">
            <table class="cart-table">
                <tbody>
                @foreach($cart::content() as $row)
                    <tr>
                        <td>
                            <div class="product-media">
                                <a href="#"> <img src="{{$row->model->image}}"
                                                  alt=" "></a>
                            </div>
                        </td>
                        <td>
                            <div class="product-content">
                                <div class="product-name">
                                    <a href="#">{{$row->model->name}}</a>
                                </div>
                                <div class="product-price">
                                    <h5 class="price"><b> {{$row->model->getFinalPriceHtml()}} * {{$row->qty}} </b></h5>
                                    <a href="#" class="delete fa fa-close"> </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <div class="sub-total">
                            <span class="title">Tổng:</span>
                            <span class="amount"> <b> {{$cart::subtotal()}} </b> </span>
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
            <div class="chk-out">
                <a href="check-out.html" class="btn default-btn">Thanh toán</a>
            </div>
        </div>
    </div>
</div>
