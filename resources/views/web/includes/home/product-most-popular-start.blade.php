<section id="product-tabination-1" class="space-bottom-45">
    <div class="container theme-container">
        <div class="light-bg product-tabination">
            <div class="tabination">
                <div class="product-tabs" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul role="tablist" class="nav nav-tabs navtab-horizontal">
                        <li role="presentation" class="active">
                            <a class="green-background" data-toggle="tab" role="tab" href="#most-popular"
                               aria-expanded="true">Xem nhiều</a>
                        </li>
                        <li class="" role="presentation">
                            <a class="pink-background" data-toggle="tab" role="tab" href="#best-sellers"
                               aria-expanded="false">Bán chạy</a>
                        </li>
                        <li role="presentation" class="">
                            <a data-toggle="tab" class="blue-background" role="tab" href="#latest-items"
                               aria-expanded="false">Mới nhất</a>
                        </li>
                        <li class="float-right" role="presentation">
                            <a class="title-link" href="{{route('page.products')}}"> Xem thêm <i
                                    class="fa fa-caret-right"></i> </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- =============================== Most Popular ============================= -->
                        <div id="most-popular" class="tab-pane fade active in" role="tabpanel">
                            <div class="col-md-12 product-wrap default-box-shadow">
                                <div class="title-wrap">
                                    <h2 class="section-title">
                                                    <span>
                                                        <span class="funky-font blue-tag">Xem nhiều</span>
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
                                    @foreach($mostViewProducts as $product)
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
                        <!-- ====================== Best Sellers ======================== -->
                        <div id="best-sellers" class="tab-pane fade" role="tabpanel">
                            <div class="col-md-12 product-wrap default-box-shadow">
                                <div class="title-wrap">
                                    <h2 class="section-title">
                                                    <span>
                                                        <span class="funky-font blue-tag">Bán chạy</span>
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
                                    @foreach($mostSellingProducts as $product)
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
                        <!-- ====================== Latest Items ======================== -->
                        <div id="latest-items" class="tab-pane fade" role="tabpanel">
                            <div class="col-md-12 product-wrap default-box-shadow">
                                <div class="title-wrap">
                                    <h2 class="section-title">
                                                    <span>
                                                        <span class="funky-font blue-tag">Mới nhất</span>
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
                                    @foreach($mostLatestProducts as $product)
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
