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
                                    <form class="product-form">
                                        <div class="row">
                                            @foreach($product->attributeGroups->unique() as $index=>$attribute)
                                                <div class="form-group selectpicker-wrapper">
                                                    <label>{{$attribute->name}}</label>
                                                    <select title="Looking to Buy" data-toggle="tooltip"
                                                            data-width="100%"
                                                            data-live-search="true"
                                                            class="selectpicker input-price bs-select-hidden">
                                                        @foreach($attribute->attributeDetails as $key=>$detail)
                                                            @if($key == 0)
                                                                <option class="bs-title-option" value="{{$detail->value}}">{{$detail->value}}</option>
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
                                        <a class="blue-btn btn" href="#"> <i
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
                <div class="col-md-8 col-sm-8">
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
                                                    {!! $product->body !!}
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
                <div class="col-md-4 col-sm-4">
                    <div class="light-bg padding-25 top-rated default-box-shadow">
                        <div class="row">
                            <div class="title-wrap col-md-9">
                                <h2 class="section-title">
                                            <span>
                                                <span class="funky-font green-tag">Top </span>
                                                <span class="italic-font">Rated</span>
                                            </span>
                                </h2>
                            </div>
                            <div class="poroduct-pagination col-md-3">
                                <span class="product-slide gray-background next"> <i
                                        class="fa fa-chevron-left"></i> </span>
                                <span class="product-slide gray-background prev"> <i
                                        class="fa fa-chevron-right"></i> </span>
                            </div>
                        </div>
                        <div class="top-rated-owl-slider">
                            <div class="item">
                                <div class="category-details">
                                    <div class="col-md-4 thumbnail">
                                        <div class="white-bg">
                                            <img alt="product-img" src="assets/img/product/thumbnail-1.png">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="product-content">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star half"></span>
                                                <span class="star"></span>
                                            </div>
                                            <div class="product-name">
                                                <a href="#">Cute Walk Clogs</a>
                                            </div>
                                            <div class="product-price">
                                                <h4 class="pink-btn-small"> $50.00 </h4>
                                            </div>
                                            <div class="product-overlay">
                                                <a href="#" class="addcart blue-background fa fa-shopping-cart"></a>
                                                <a href="#" class="likeitem green-background fa fa-heart"></a>
                                                <a class="preview pink-background fa fa-eye" href="#product-preview"
                                                   data-toggle="modal"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="category-details">
                                    <div class="col-md-4 thumbnail">
                                        <div class="white-bg">
                                            <img alt="product-img" src="assets/img/product/thumbnail-2.png">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="product-content">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star half"></span>
                                                <span class="star"></span>
                                            </div>
                                            <div class="product-name">
                                                <a href="#">Tales & Stories Singlet Denim</a>
                                            </div>
                                            <div class="product-price">
                                                <h4 class="pink-btn-small"> $50.00 </h4>
                                            </div>
                                            <div class="product-overlay">
                                                <a href="#" class="addcart blue-background fa fa-shopping-cart"></a>
                                                <a href="#" class="likeitem green-background fa fa-heart"></a>
                                                <a class="preview pink-background fa fa-eye" href="#product-preview"
                                                   data-toggle="modal"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="category-details">
                                    <div class="col-md-4 thumbnail">
                                        <div class="white-bg">
                                            <img alt="product-img" src="assets/img/product/thumbnail-3.png">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="product-content">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star half"></span>
                                                <span class="star"></span>
                                            </div>
                                            <div class="product-name">
                                                <a href="#">Babyhug Singlet Party Frock</a>
                                            </div>
                                            <div class="product-price">
                                                <h4 class="pink-btn-small"> $50.00 </h4>
                                            </div>
                                            <div class="product-overlay">
                                                <a href="#" class="addcart blue-background fa fa-shopping-cart"></a>
                                                <a href="#" class="likeitem green-background fa fa-heart"></a>
                                                <a class="preview pink-background fa fa-eye" href="#product-preview"
                                                   data-toggle="modal"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="category-details">
                                    <div class="col-md-4 thumbnail">
                                        <div class="white-bg">
                                            <img alt="product-img" src="assets/img/product/thumbnail-1.png">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="product-content">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star half"></span>
                                                <span class="star"></span>
                                            </div>
                                            <div class="product-name">
                                                <a href="#">Cute Walk Clogs</a>
                                            </div>
                                            <div class="product-price">
                                                <h4 class="pink-btn-small"> $50.00 </h4>
                                            </div>
                                            <div class="product-overlay">
                                                <a href="#" class="addcart blue-background fa fa-shopping-cart"></a>
                                                <a href="#" class="likeitem green-background fa fa-heart"></a>
                                                <a class="preview pink-background fa fa-eye" href="#product-preview"
                                                   data-toggle="modal"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="category-details">
                                    <div class="col-md-4 thumbnail">
                                        <div class="white-bg">
                                            <img alt="product-img" src="assets/img/product/thumbnail-2.png">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="product-content">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star half"></span>
                                                <span class="star"></span>
                                            </div>
                                            <div class="product-name">
                                                <a href="#">Tales & Stories Singlet Denim</a>
                                            </div>
                                            <div class="product-price">
                                                <h4 class="pink-btn-small"> $50.00 </h4>
                                            </div>
                                            <div class="product-overlay">
                                                <a href="#" class="addcart blue-background fa fa-shopping-cart"></a>
                                                <a href="#" class="likeitem green-background fa fa-heart"></a>
                                                <a class="preview pink-background fa fa-eye" href="#product-preview"
                                                   data-toggle="modal"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="category-details">
                                    <div class="col-md-4 thumbnail">
                                        <div class="white-bg">
                                            <img alt="product-img" src="assets/img/product/thumbnail-3.png">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="product-content">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star half"></span>
                                                <span class="star"></span>
                                            </div>
                                            <div class="product-name">
                                                <a href="#">Babyhug Singlet Party Frock</a>
                                            </div>
                                            <div class="product-price">
                                                <h4 class="pink-btn-small"> $50.00 </h4>
                                            </div>
                                            <div class="product-overlay">
                                                <a href="#" class="addcart blue-background fa fa-shopping-cart"></a>
                                                <a href="#" class="likeitem green-background fa fa-heart"></a>
                                                <a class="preview pink-background fa fa-eye" href="#product-preview"
                                                   data-toggle="modal"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Products Description Ends -->
        <!-- Related Products Start -->
        <section id="product-tabination-1" class="space-bottom-45">
            <div class="container theme-container">
                <div class="title-wrap with-border space-25">
                    <h2 class="section-title with-border">
                                <span class="white-bg">
                                    <span class="funky-font blue-tag">Related</span>
                                    <span class="italic-font">Product</span>
                                </span>
                    </h2>
                    <h3 class="sub-title">Recently Item You Viewed</h3>
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
                                <li class="" role="presentation">
                                    <a class="pink-background" data-toggle="tab" role="tab" href="#recently-viewed"
                                       aria-expanded="false">Recently Viewed</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- ====================== Related Products ======================== -->
                                <div id="related-product" class="tab-pane fade active in" role="tabpanel">
                                    <div class="col-md-12 product-wrap default-box-shadow">
                                        <div class="title-wrap">
                                            <h2 class="section-title">
                                                        <span>
                                                            <span class="funky-font blue-tag">Best</span>
                                                            <span class="italic-font">Sellers</span>
                                                        </span>
                                            </h2>
                                            <div class="poroduct-pagination">
                                                <span class="product-slide blue-background next"> <i
                                                        class="fa fa-chevron-left"></i> </span>
                                                <span class="product-slide blue-background prev"> <i
                                                        class="fa fa-chevron-right"></i> </span>
                                            </div>
                                        </div>
                                        <div class="product-slider owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product5.png" alt="product-img">
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product6.png" alt="product-img">
                                                        <div class="product-new">
                                                            <div class="golden-new-tag new-tag">
                                                                <a class="funky-font" href="#">New</a>
                                                            </div>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product7.png" alt="product-img">
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product8.png" alt="product-img">
                                                        <div class="product-new">
                                                            <div class="blue-new-tag new-tag">
                                                                <a class="funky-font" href="#">New</a>
                                                            </div>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product5.png" alt="product-img">
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product6.png" alt="product-img">
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====================== Recently Viewed ======================== -->
                                <div id="recently-viewed" class="tab-pane fade" role="tabpanel">
                                    <div class="col-md-12 product-wrap default-box-shadow">
                                        <div class="title-wrap">
                                            <h2 class="section-title">
                                                        <span>
                                                            <span class="funky-font blue-tag">Latest</span>
                                                            <span class="italic-font">Items</span>
                                                        </span>
                                            </h2>
                                            <div class="poroduct-pagination">
                                                <span class="product-slide blue-background next"> <i
                                                        class="fa fa-chevron-left"></i> </span>
                                                <span class="product-slide blue-background prev"> <i
                                                        class="fa fa-chevron-right"></i> </span>
                                            </div>
                                        </div>
                                        <div class="product-slider owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product9.png" alt="product-img">
                                                        <div class="product-new">
                                                            <div class="golden-new-tag new-tag">
                                                                <a class="funky-font" href="#">New</a>
                                                            </div>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product10.png" alt="product-img">
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product11.png" alt="product-img">
                                                        <div class="product-new">
                                                            <div class="blue-new-tag new-tag">
                                                                <a class="funky-font" href="#">New</a>
                                                            </div>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product12.png" alt="product-img">
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product9.png" alt="product-img">
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="product-details">
                                                    <div class="product-media">
                                                                <span class="hover-image white-bg">
                                                                    <img src="assets/img/product/cat-7.png" alt="">
                                                                </span>
                                                        <img src="assets/img/product/product10.png" alt="product-img">
                                                        <div class="product-overlay">
                                                            <a class="addcart blue-background fa fa-shopping-cart"
                                                               href="#"></a>
                                                            <a class="likeitem green-background fa fa-heart"
                                                               href="#"></a>
                                                            <a class="preview pink-background fa fa-eye"
                                                               href="#product-preview" data-toggle="modal"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="rating">
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star active"></span>
                                                            <span class="star half"></span>
                                                            <span class="star"></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>

                                                        </div>
                                                        <div class="product-price">
                                                            <h4 class="pink-btn-small"> $50.00 </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
