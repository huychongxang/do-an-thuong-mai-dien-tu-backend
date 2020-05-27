@extends('web.layouts.master')
@section('content')
    @include('web.includes.breadcrumbs',[
   'title1'=>null,
   'title2'=>null,
   'title3'=>'Tài khoản',
   'parent'=>[],
   'current'=>'Tài khoản'
   ])

    <article  class="container theme-container">
        <div class="row">
            <!-- Sidebar Start -->
            <aside class="col-md-4 col-sm-4 space-bottom-20">
                <div class="blog-sidebar-widget light-bg default-box-shadow">
                    <h4 class="widget-title blue-bg"> <span>  Tài khoản  </span> </h4>
                    <div class="blog-widget-content">
                        <ul>
                            <li  class="accout-item"><a href="account-info.html"> Thông tin tài khoản </a></li>
                            <li  class="accout-item active"><a href="my-account.html">Tài khoản của tôi</a></li>
                            <li  class="accout-item"><a href="cng-pw.html">Đổi mật khẩu</a></li>
                            <li  class="accout-item"><a href="address-book.html">Địa chỉ</a></li>
                            <li  class="accout-item"><a href="order-history.html">Lịch sử đơn hàng</a></li>
                            <li  class="accout-item"><a href="return.html">Trạng thái hoàn trả</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- / Sidebar Ends -->

            <!-- Posts Start -->
            <aside class="col-md-8 col-sm-8 space-bottom-20">
                <div class="title-wrap  text-center space-bottom-25">
                    <h2 class="section-title with-border">
                                <span class="white-bg">
                                    <span class="funky-font pink-tag">My</span>
                                    <span class="italic-font">Account</span>
                                </span>
                    </h2>
                </div>
                <div class="account-details-wrap">
                    <div class="title-2 sub-title-small">  Tài khoản của tôi</div>
                    <div class="account-box  light-bg default-box-shadow">
                        <ul>
                            <li>
                                <a href="account-info.html">Sửa thông tin tài khoản</a>
                            </li>
                            <li>
                                <a href="cng-pw.html">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a href="address-book.html">Đổi địa chỉ</a>
                            </li>
                        </ul>
                    </div>

                    <div class="title-2 sub-title-small"> Đơn hàng </div>
                    <div class="account-box  light-bg default-box-shadow">
                        <ul>
                            <li>
                                <a href="order-history.html">Xem lịch sử đơn hàng</a>
                            </li>
                            <li>
                                <a href="return.html">Xem trạng thái hoàn trả</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </aside>
            <!-- Posts Ends -->
        </div>
    </article>
@endsection
