@extends('web.layouts.master')
@section('content')
    @include('web.includes.breadcrumbs',[
   'title1'=>null,
   'title2'=>null,
   'title3'=>$product->name,
   'parent'=>[],
   'current'=>$product->name
   ])
    <article class="container theme-container">
        <!-- Single Products Start -->
        <section id="product-fullwidth" class="space-bottom-45">
            <div class="single-product-wrap">
                <div class="list-category-details">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="row">
                                <!-- Main Slider Start -->
                                <section id="main-slider" class="carousel slide main-slider">
                                    <!--Carousel Slide Button Start-->
                                    <div class="slider-pagination col-md-2 col-sm-3  col-xs-3">
                                        <ul class="product-thumbnails">
                                            <li data-slide-to="0" data-target="#main-slider">
                                                <a href="#"><img class="img-responsive" alt="img"
                                                                 src="{{$product->image}}"></a></li>
                                            @foreach($product->images as $key=>$image)
                                                <li data-slide-to="{{$key+1}}" data-target="#main-slider">
                                                    <a href="#"><img class="img-responsive" alt="img"
                                                                     src="{{$image->image}}"></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-9  col-xs-9">
                                        <div class="carousel-inner product-fullwidth light-bg slider">
                                            <div class="item active">
                                                <img src="{{$product->image}}" alt="...">
                                            </div>
                                            @foreach($product->images as $image)
                                                <div class="item">
                                                    <img src="{{$image->image}}" alt="...">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </section>
                                <!-- / Main Slider Ends -->
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5">
                            <div class="product-content">
                                <div class="product-name">
                                    <a href="#">{{$product->name}}</a>
                                </div>
                                <div class="product-price">
                                    @if(!$product->processPromotionPrice())
                                        <h4 class="pink-btn-small"> {{$product->getFinalPriceHtml()}} </h4>
                                    @else
                                        <h4 class="pink-btn-small price-line"> {{$product->getPriceHtml()}} </h4>
                                        <h4 class="blue-btn-small"> {{$product->getFinalPriceHtml()}} </h4>
                                    @endif
                                </div>
                                <div class="product-availability">
                                    <ul class="stock-detail">
                                        @if($product->isInStock())
                                            <li>Available:<strong class="green-color"> <i
                                                        class="fa fa-check-circle"></i> In
                                                    Stock </strong> |
                                            </li>
                                        @endif

                                        <li>Mã sản phẩm:<strong> {{$product->sku}} </strong></li>
                                    </ul>
                                    <hr class="fullwidth-divider">
                                </div>
                                <div class="product-size">
                                    <form id="main-form" class="product-form" method="post"
                                          action="{{route('page.product.add')}}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="row">
                                            @foreach($product->attributeGroups->unique() as $index=>$attribute)
                                                <div class="form-group selectpicker-wrapper">
                                                    <label>{{$attribute->name}}</label>
                                                    <select name="options[{{$attribute->code}}]"
                                                            data-toggle="tooltip"
                                                            data-width="100%"
                                                            data-live-search="true"
                                                            class="selectpicker input-price bs-select-hidden">
                                                        @foreach($attribute->attributeDetails as $key=>$detail)
                                                            @if($key == 0)
                                                                <option class="bs-title-option"
                                                                        value="{{$detail->value}}">{{$detail->value}}</option>
                                                            @endif
                                                            <option
                                                                value="{{$detail->value}}">{{$detail->value}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            @endforeach
                                            <div class="form-group selectpicker-wrapper">
                                                <label>QTY</label>
                                                <select name="qty" title="Looking to Buy" data-toggle="tooltip"
                                                        data-width="100%"
                                                        data-live-search="true"
                                                        class="selectpicker input-price bs-select-hidden">
                                                    <option class="bs-title-option" value="1">1</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                    <hr class="fullwidth-divider">
                                </div>
                                <div class="product-discription">
                                    <p>{!! $product->description !!}</p>
                                </div>
                                @if($product->isInStock())
                                    <div class="add-to-cart">
                                        <a class="blue-btn btn"> <i
                                                class="fa fa-shopping-cart white-color"></i>
                                            Thêm vào giỏ hàng</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Products Ends -->
        <!-- Single Products Description Start -->
        <section id="description-item">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Product Best Sellers Start -->
                    <section id="single-product-tabination" class="space-bottom-45">
                        <div class="light-bg product-tabination default-box-shadow">
                            <div class="tabination">
                                <div class="product-tabs" role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul role="tablist" class="nav nav-tabs navtab-horizontal">
                                        <li role="presentation" class="active">
                                            <a class="green-background" data-toggle="tab" role="tab" href="#description"
                                               aria-expanded="true">Nội dung</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <!-- =============================== Description ============================= -->
                                        <div id="description" class="tab-pane fade active in" role="tabpanel">
                                            <div class="col-md-12 product-wrap">
                                                <div class="title-wrap">
                                                    <h2 class="section-title">
                                                                <span>
                                                                    <span class="italic-font">Giới thiệu sản phẩm</span>
                                                                </span>
                                                    </h2>
                                                </div>
                                                <div class="product-disc space-bottom-35">
                                                    {!! $product->content !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- / Product Best Sellers Ends -->
                </div>
            </div>
        </section>
        <!-- Single Products Description Ends -->
        <!-- Related Products Start -->
        <section id="product-tabination-1" class="space-bottom-45">
            <div class="container theme-container">
                <div class="title-wrap with-border space-25">
                    <h2>
                                <span class="white-bg">
                                    <span>Sản phẩm liên quan</span>
                                </span>
                    </h2>
                    <hr class="dash-divider">
                </div>
                <div class="light-bg product-tabination">
                    <div class="tabination">
                        <div class="product-tabs" role="tabpanel">
                            <!-- Nav tabs -->
                            <ul role="tablist" class="nav nav-tabs navtab-horizontal">
                                <li role="presentation" class="active">
                                    <a class="green-background" data-toggle="tab" role="tab" href="#related-product"
                                       aria-expanded="true">Related Products</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- ====================== Related Products ======================== -->
                                <div id="related-product" class="tab-pane fade active in" role="tabpanel">
                                    <div class="col-md-12 product-wrap default-box-shadow">
                                        <div class="title-wrap">
                                            <div class="poroduct-pagination">
                                                <span class="product-slide blue-background next"> <i
                                                        class="fa fa-chevron-left"></i> </span>
                                                <span class="product-slide blue-background prev"> <i
                                                        class="fa fa-chevron-right"></i> </span>
                                            </div>
                                        </div>
                                        <div class="product-slider owl-carousel owl-theme">
                                            @foreach($relatedProducts as $product)
                                                <div class="item">
                                                    <div class="product-details">
                                                        <div class="product-media">
                                                            <span class="hover-image white-bg">
                                                                <img alt=""
                                                                     src="{{$product->getFirstSubImage()}}">
                                                            </span>
                                                            <img src="{{$product->image}}" alt=" ">
                                                            @if($product->getType() == 'New')
                                                                <div class="product-new">
                                                                    <div class="golden-new-tag new-tag">
                                                                        <a class="funky-font">New</a>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($product->getType() == 'Hot')
                                                                <div class="product-new">
                                                                    <div class="blue-new-tag new-tag">
                                                                        <a class="funky-font">Hot</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="product-overlay">
                                                                <a data-id="{{$product->id}}"
                                                                   class="addcart blue-background fa fa-shopping-cart"
                                                                   href="#"></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <div class="product-name">
                                                                <p>
                                                                    <a href="{{route('page.product',$product->sku)}}">{{$product->name}}</a>
                                                                </p>
                                                            </div>
                                                            <div class="product-price">
                                                                @if(!$product->processPromotionPrice())
                                                                    <h4 class="pink-btn-small"> {{$product->getFinalPriceHtml()}} </h4>
                                                                @else
                                                                    <h4 class="pink-btn-small price-line"> {{$product->getPriceHtml()}} </h4>
                                                                    <h4 class="blue-btn-small"> {{$product->getFinalPriceHtml()}} </h4>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- / Related Products Ends -->
    </article>
@endsection
@push('scripts')
    <script>
        $(function () {
            $("body").on("click", '.add-to-cart', function (event) {
                event.preventDefault();
                @guest
                $('#login-register').modal('show');
                return false;
                @endguest
                $('#main-form').submit();
            });
        });
    </script>

@endpush
