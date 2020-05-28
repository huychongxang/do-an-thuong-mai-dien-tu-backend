<header class="light-bg">
    <!-- Header top bar starts-->
    <section class="top-bar">
        <div class="container theme-container">
            <div class="bg-with-mask box-shadow">
                <span class="blue-color-mask color-mask"></span>
                <nav class="navbar navbar-default top-navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="visible-xs logo" href="#"> <img src="{{asset('web/assets/img/logo/logo.png')}}"
                                                                  alt=" "/> </a>
                    </div>
                    <div class="collapse navbar-collapse no-padding" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav pull-right">
                            @guest
                                <li><a href="#login-register" data-toggle="modal">Đăng ký/Đăng nhập</a></li>
                            @endguest
                            @auth
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true">Tài khoản <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('page.my-account')}}">Tài khoản của tôi</a></li>
                                        <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                                    </ul>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
            <img src="{{asset('web/assets/img/pattern/ziz-zag.png')}}" class="blue-zig-zag" alt=" ">
        </div>

    </section>
    <!-- /Header top bar ends -->
    <div class="container theme-container ">
        <section class="header-wrapper white-bg fixed">
            <div class="row">
                <div class="container theme-container ">
                    <article class="header-middle">
                        <!-- Logo -->
                        <div class="logo hidden-xs col-md-3  col-sm-3">
                            <a href="{{route('home')}}"><img src="{{asset('web/assets/img/logo/logo.png')}}"
                                                             alt=" "/></a>
                        </div>
                        <!-- /Logo -->

                        <!-- Header search -->
                        <div class="header-search col-md-6  col-sm-5">
                            <form action="#" class="search-form">
                                <div class="no-padding col-sm-12 search-cat">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="search" title="Search for:" name="s" value=""
                                               placeholder="Search for a Category, Brand or Product"
                                               class="search-field">
                                    </label>
                                    <input type="submit" value="Search" class="search-submit">
                                </div>
                            </form>
                        </div>
                        <!-- /Header search -->

                        <!-- Header shopping cart -->
                    @auth
                        @if(Route::current()->getName() != 'page.cart')
                            @include('web.includes.header-cart')
                        @endif

                    @endauth
                    <!-- Header shopping cart -->
                    </article>

                    <article class="header-navigation">
                        <nav class="navbar navbar-default product-menu">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#product-menu">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse no-padding" id="product-menu">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                                    <li><a href="{{route('page.products')}}">Sản phẩm</a></li>
                                    <li><a href="">Tin tức</a></li>
                                    <li><a href="{{route('page.cart')}}">Giỏ hàng</a></li>
                                    <li><a href="">Về chúng tôi</a></li>
                                </ul>
                            </div>
                        </nav>
                    </article>
                </div>
            </div>
        </section>
    </div>
</header>
