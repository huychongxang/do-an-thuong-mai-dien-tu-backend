<div id="header-cart" class="header-cart col-md-3  col-sm-4">
    <div class="cart-wrapper">
        <a href="javascript:void(0)" class="btn cart-btn default-btn">
            <i class="fa fa-shopping-cart blue-color"></i>
            <span><b> Giỏ hàng: </b></span> <span id="header-cart-total"
                                                  class="blue-color"> <strong> ({{$cart::count()}}) </strong> </span>
            <span class="fa fa-caret-down"></span>
        </a>
    </div>
    <div class="cart-dropdown bg2-with-mask">
        <span class="blue-color-mask blue-box-shadow color-mask-radius"></span>
        <div class="pos-relative">
            <table class="cart-table">
                <tbody id="header-cart-body">
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
                                    @foreach($row->options as $key=>$value)
                                        @php
                                        $name = \App\Models\ProductAttributeGroup::where('code',$key)->first()->name;
                                        @endphp
                                        <p>{{$name}} : {{$value}}</p>
                                    @endforeach

                                </div>
                                <div class="product-price">
                                    <h5 class="price"><b> {{$row->model->getFinalPriceHtml()}} * {{$row->qty}} </b></h5>
                                    <a data-row="{{$row->rowId}}" data-id="{{$row->id}}"
                                       class="delete delete-row-item fa fa-close"> </a>
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
                            <span class="amount" id="header-cart-subtotal"> <b> {{$cart::subtotal()}} </b> </span>
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
            <div class="chk-out">
                <a href="{{route('page.checkout')}}" class="btn default-btn">Thanh toán</a>
            </div>
        </div>
    </div>
</div>
