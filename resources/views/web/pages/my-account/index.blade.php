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
                    <h4 class="widget-title blue-bg"> <span>  Account  </span> </h4>
                    <div class="blog-widget-content">
                        <ul>
                            <li  class="accout-item"><a href="account-info.html"> Account Information </a></li>
                            <li  class="accout-item active"><a href="my-account.html">My Account</a></li>
                            <li  class="accout-item"><a href="cng-pw.html">Change Password</a></li>
                            <li  class="accout-item"><a href="address-book.html">Address Books</a></li>
                            <li  class="accout-item"><a href="order-history.html">Order History</a></li>
                            <li  class="accout-item"><a href="review-rating.html">Reviews and Ratings</a></li>
                            <li  class="accout-item"><a href="return.html">Returns Requests</a></li>
                            <li  class="accout-item"><a href="newsletter.html">Newsletter</a></li>
                            <li  class="accout-item"><a href="myaccount-leftsidebar.html">Left Sidebar</a></li>
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
                    <div class="title-2 sub-title-small">  My Account</div>
                    <div class="account-box  light-bg default-box-shadow">
                        <ul>
                            <li>
                                <a href="account-info.html">Edit your account information</a>
                            </li>
                            <li>
                                <a href="cng-pw.html">Change your password</a>
                            </li>
                            <li>
                                <a href="address-book.html">Modify your address book entries</a>
                            </li>
                        </ul>
                    </div>

                    <div class="title-2 sub-title-small"> order and review </div>
                    <div class="account-box  light-bg default-box-shadow">
                        <ul>
                            <li>
                                <a href="order-history.html">View your order history</a>
                            </li>
                            <li>
                                <a href="review-rating.html">Your reviews and ratings</a>
                            </li>
                            <li>
                                <a href="return.html">View your retun requests</a>
                            </li>
                        </ul>
                    </div>

                    <div class="title-2 sub-title-small">  Newsletter </div>
                    <div class="account-box  light-bg default-box-shadow">
                        <ul>
                            <li>
                                <a href="newsletter.html">Subscribe / unsubscribe to newsletter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- Posts Ends -->
        </div>
    </article>
@endsection
