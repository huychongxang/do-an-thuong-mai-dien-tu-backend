@extends('web.layouts.master')
@section('content')
    <!-- Breadcrumbs Start -->
    <section class="breadcrumb-bg">
        <span class="gray-color-mask color-mask"></span>
        <div class="theme-container container">
            <div class="site-breadcrumb relative-block space-75">
                <h2 class="section-title">
                            <span>
                                <span class="funky-font blue-tag">Error</span>
                                <span class="italic-font">404 Page</span>
                            </span>
                </h2>
                <h3 class="sub-title">Page not Found </h3>
                <hr class="dash-divider">
                <ol class="breadcrumb breadcrumb-menubar">
                    <li><a href="{{route('home')}}">Home</a> > <span class="blue-color">404 Error Page</span></li>
                </ol>
            </div>
        </div>
    </section>
    <!-- / Breadcrumbs Ends -->

    <!-- 404 Error  Start -->
    <section id="error-page" class="error-wrap light-bg space-80">
        <div class="theme-container container">
            <div class="row space-40">
                <div class="col-md-6 col-sm-5 text-right">
                    <h1 class="error-title funky-font">
                        <span class="blue-color">o</span><span class="pink-color">0</span><span
                                class="green-color">p</span><span class="golden-color">s</span><span
                                class="purple-color">!</span>
                    </h1>
                </div>
                <div class="col-md-6 col-sm-7 error-info">
                    <div class="title-wrap">
                        <h2 class="section-title">
                                    <span>
                                        <span class="funky-font blue-tag">Không tìm thấy</span>
                                        <span class="italic-font"></span>
                                    </span>
                        </h2>
                        <h3 class="sub-title">404 Error :<span class="blue-color"> Page not found </span></h3>
                        <hr class="dash-divider">
                    </div>
                    <div class="error-details">
                        <p>

                        </p>
                        <a class="blue-btn btn" href="{{route('home')}}"><i class="fa fa-caret-left"></i>Trở lại trang
                            chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / 404 Error  Ends -->
@endsection
