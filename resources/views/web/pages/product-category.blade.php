@extends('web.layouts.master')
@section('content')
    @include('web.includes.breadcrumbs',[
    'title1'=>null,
    'title2'=>null,
    'title3'=>'Danh mục sản phẩm',
    'parent'=>[],
    'current'=>'Danh mục sản phẩm'
    ])
    <!-- Product Category Start -->
    <section id="product-category-fullwidth" class="space-bottom-45">
        <div class="container theme-container">
            <div class="space-bottom-35">
                <div class="light-bg sorter">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="view-as col-md-3 col-sm-3">
                                <span>View as:</span>
                                <div class="inline-block">
                                    <ul class="nav-tabs tabination">
                                        <li class="active">
                                            <a data-toggle="tab" href="#grid-view" aria-expanded="true">
                                                <i class="fa fa-th-large"></i>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#list-view" aria-expanded="false">
                                                <i class="fa fa-th-list"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pull-right col-sm-12">
                        <div class="row">
                            <div class="show-as col-sm-3 col-md-4 col-md-offset-2 text-right">
                                <span>Show:</span>
                                <div class="inline-block">
                                    <form class="filter-form">
                                        <div class="form-group selectpicker-wrapper">
                                            <select
                                                    class="selectpicker input-price" data-live-search="true"
                                                    data-width="100%"
                                                    data-toggle="tooltip" title="16">
                                                <option>20</option>
                                                <option>24</option>
                                                <option>All</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="page-by col-sm-9 col-md-6 text-right">
                                <span>Page:</span>
                                <div class="inline-block">
                                    <div class="pagination-wrapper">
                                        <ul class="pagination-list">
                                            <li><a href="#"> 1 </a></li>
                                            <li><a href="#"> 2 </a></li>
                                            <li class="active"> 3</li>
                                            <li><a href="#"> 4 </a></li>
                                            <li><a href="#"> 5 </a></li>
                                            <li class="nxt"><a href="#"> <i class="fa fa-angle-right"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="grid-view" class="tab-pane fade active in" role="tabpanel">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 grid-box">
                            <div class="product-details">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img alt="product-img" src="{{asset('web/assets/img/product/cat-1.png')}}">
                                    <div class="product-new">
                                        <div class="blue-new-tag new-tag">
                                            <a href="#" class="funky-font">New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">T-Shirt</span> (12) </p>
                                        <p><a href="#">Noddy Hooded Sweatshirt Full Sleeves</a></p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 grid-box">
                            <div class="product-details">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img alt="product-img" src="{{asset('web/assets/img/product/cat-2.png')}}">
                                </div>
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">skirts</span> (8) </p>
                                        <p><a href="#">Babyhug Layer Pattern Skirt</a></p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 grid-box">
                            <div class="product-details">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img alt="product-img" src="{{asset('web/assets/img/product/cat-3.png')}}">
                                </div>
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Gathered Dress</span> (5)
                                        </p>
                                        <p><a href="#">Peppermint Layered Party Wear Frock</a></p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 grid-box">
                            <div class="product-details">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img alt="product-img" src="{{asset('web/assets/img/product/cat-4.png')}}">
                                </div>
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Western Dress</span> (6)
                                        </p>
                                        <p><a href="#">Little Darling Multi Layer Party Frock</a></p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 grid-box">
                            <div class="product-details">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img alt="product-img" src="{{asset('web/assets/img/product/cat-5.png')}}">
                                </div>
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Empire Waist Dress</span>
                                            (6) </p>
                                        <p><a href="#">Babyhug Sleeveless Party Dress Pearl</a></p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 grid-box">
                            <div class="product-details">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img alt="product-img" src="{{asset('web/assets/img/product/cat-6.png')}}">
                                    <div class="product-new">
                                        <div class="blue-new-tag new-tag">
                                            <a href="#" class="funky-font">New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Full Sleeves T-Shirt</span>
                                            (16) </p>
                                        <p><a href="#">Noddy Hooded Sweatshirt Full Sleeves</a></p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 grid-box">
                            <div class="product-details">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img alt="product-img" src="{{asset('web/assets/img/product/cat-7.png')}}">
                                </div>
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Frock Flower</span> (26)
                                        </p>
                                        <p><a href="#">Babyhug Singlet Party Frock Flower</a></p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 grid-box">
                            <div class="product-details">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img alt="product-img" src="{{asset('web/assets/img/product/cat-8.png')}}">
                                </div>
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Quilted Jacket</span> (26)
                                        </p>
                                        <p><a href="#">Babyhug Frock Style Top And Leggings</a></p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="list-view" class="tab-pane fade" role="tabpanel">
                    <div class="list-category-details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img src="{{asset('web/assets/img/product/cat-1.png')}}" alt="product-img">
                                    <div class="product-new">
                                        <div class="blue-new-tag new-tag">
                                            <a class="funky-font" href="#">New</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">T-Shirt</span> (12) </p>
                                        <a href="#">Noddy Hooded Sweatshirt Full Sleeves</a>

                                    </div>
                                    <div class="product-discription">
                                        <p>Vivamus porttitor elit vitae sapien auctor, id elementum felis volutpat.
                                            Vestibulum euismd rutrum tincidunt sollicitudin. Maecenas odio ex, congue id
                                            hendrerit et, sagittis vel arcu. Phasellus nec felis a dolor suscipit
                                            rhoncus. Vivamus porttitor elit vitae sapien auctor, id elementum felis
                                            volutpat. Vestibulum euismod.</p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-category-details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img src="{{asset('web/assets/img/product/cat-2.png')}}" alt="product-img">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">skirts </span> (8) </p>
                                        <a href="#">Babyhug Layer Pattern Skirt</a>
                                    </div>
                                    <div class="product-discription">
                                        <p>Vivamus porttitor elit vitae sapien auctor, id elementum felis volutpat.
                                            Vestibulum euismd rutrum tincidunt sollicitudin. Maecenas odio ex, congue id
                                            hendrerit et, sagittis vel arcu. Phasellus nec felis a dolor suscipit
                                            rhoncus. Vivamus porttitor elit vitae sapien auctor, id elementum felis
                                            volutpat. Vestibulum euismod.</p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-category-details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img src="{{asset('web/assets/img/product/cat-3.png')}}" alt="product-img">
                                    <div class="product-new">
                                        <div class="blue-new-tag new-tag">
                                            <a class="funky-font" href="#">New</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Gathered Dress </span> (5)
                                        </p>
                                        <a href="#">Peppermint Layered Party Wear Frock</a>
                                    </div>

                                    <div class="product-discription">
                                        <p>Vivamus porttitor elit vitae sapien auctor, id elementum felis volutpat.
                                            Vestibulum euismd rutrum tincidunt sollicitudin. Maecenas odio ex, congue id
                                            hendrerit et, sagittis vel arcu. Phasellus nec felis a dolor suscipit
                                            rhoncus. Vivamus porttitor elit vitae sapien auctor, id elementum felis
                                            volutpat. Vestibulum euismod.</p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-category-details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img src="{{asset('web/assets/img/product/cat-5.png')}}" alt="product-img">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Western Dress  </span> (6)
                                        </p>
                                        <a href="#">Little Darling Multi Layer Party Frock</a>
                                    </div>
                                    <div class="product-discription">
                                        <p>Vivamus porttitor elit vitae sapien auctor, id elementum felis volutpat.
                                            Vestibulum euismd rutrum tincidunt sollicitudin. Maecenas odio ex, congue id
                                            hendrerit et, sagittis vel arcu. Phasellus nec felis a dolor suscipit
                                            rhoncus. Vivamus porttitor elit vitae sapien auctor, id elementum felis
                                            volutpat. Vestibulum euismod.</p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-category-details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img src="{{asset('web/assets/img/product/cat-5.png')}}" alt="product-img">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Empire Waist Dress </span>
                                            (6) </p>
                                        <a href="#">Babyhug Sleeveless Party Dress Pearl</a>
                                    </div>
                                    <div class="product-discription">
                                        <p>Vivamus porttitor elit vitae sapien auctor, id elementum felis volutpat.
                                            Vestibulum euismd rutrum tincidunt sollicitudin. Maecenas odio ex, congue id
                                            hendrerit et, sagittis vel arcu. Phasellus nec felis a dolor suscipit
                                            rhoncus. Vivamus porttitor elit vitae sapien auctor, id elementum felis
                                            volutpat. Vestibulum euismod.</p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-category-details">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product-media light-bg">
                                            <span class="hover-image light-bg">
                                                <img src="{{asset('web/assets/img/product/cat-7.png')}}" alt="">
                                            </span>
                                    <img src="{{asset('web/assets/img/product/cat-6.png')}}" alt="product-img">
                                    <div class="product-new">
                                        <div class="blue-new-tag new-tag">
                                            <a class="funky-font" href="#">New</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-content">
                                    <div class="product-name">
                                        <p class="sub-title-small"><span class="pink-color">Full Sleeves T-Shirt</span>
                                            (16) </p>
                                        <a href="#">Noddy Hooded Sweatshirt Full Sleeves</a>
                                    </div>
                                    <div class="product-discription">
                                        <p>Vivamus porttitor elit vitae sapien auctor, id elementum felis volutpat.
                                            Vestibulum euismd rutrum tincidunt sollicitudin. Maecenas odio ex, congue id
                                            hendrerit et, sagittis vel arcu. Phasellus nec felis a dolor suscipit
                                            rhoncus. Vivamus porttitor elit vitae sapien auctor, id elementum felis
                                            volutpat. Vestibulum euismod.</p>
                                    </div>
                                    <div class="product-price">
                                        <a href="#" class="blue-btn btn"> view all </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="light-bg sorter">
                <div class="col-md-6 col-sm-12 show-items">
                    <span>Showing Items : 12 to 24 total 152</span>
                </div>
                <div class="col-md-6 col-sm-12 bottom-pagination text-right">
                    <div class="inline-block">
                        <div class="pagination-wrapper">
                            <ul class="pagination-list">
                                <li class="prev"><a href="#"> <i class="fa fa-angle-left"></i> </a></li>
                                <li><a href="#"> 1 </a></li>
                                <li><a href="#"> 2 </a></li>
                                <li class="active"> 3</li>
                                <li><a href="#"> 4 </a></li>
                                <li><a href="#"> 5 </a></li>
                                <li class="nxt"><a href="#"> <i class="fa fa-angle-right"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Product Category Ends -->
@endsection
