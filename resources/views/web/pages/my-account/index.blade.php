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
                    <div class="title-2 sub-title-small"> Tài khoản của tôi</div>
                    <div class="account-box  light-bg default-box-shadow">
                        <ul>
                            <li>
                                <a href="{{route('page.account-info.edit')}}">Sửa thông tin tài khoản</a>
                            </li>
                            @if(auth()->user()->isNormailAccount())
                                <li>
                                    <a href="{{route('page.password.edit')}}">Đổi mật khẩu</a>
                                </li>
                            @endif
                            <li>
                                <a href="address-book.html">Đổi địa chỉ</a>
                            </li>
                        </ul>
                    </div>

                    <div class="title-2 sub-title-small"> Đơn hàng</div>
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
