<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-olive">
    <!-- Brand Logo -->
    <a href="{{route(env('ADMIN_PATH','cms').'.dashboard')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Trang quản trị</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>

                <form id="logout-form" action="{{ route(env('ADMIN_PATH','cms').'.logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Đăng xuất</button>
                </form>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                @php
                    $routeNames = Route::currentRouteName();
                    $name = explode('.',$routeNames)[1];
                    $active = in_array($name,[
                    'roles','admins'
                    ]) ? 'active': null;
                        $open = ($active) ? 'menu-open' : null;
                @endphp
                <li class="nav-item has-treeview {{$open}}">
                    <a href="#"
                       class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Quản lý quản trị viên
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.admins.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.admins.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-user-secret nav-icon"></i>
                                <p>Quản lý quản trị viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.roles.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.roles.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>Quản lý nhóm quyền</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @php
                    $active = Route::is(env('ADMIN_PATH','cms').'.product*') ? 'active': null;
                    $open = ($active) ? 'menu-open' : null;
                @endphp
                <li class="nav-item has-treeview {{$open}}">
                    <a href="#"
                       class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.product-categories.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.product-categories.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-folder nav-icon"></i>
                                <p>Quản lý danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.product.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.product.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fab fa-product-hunt nav-icon"></i>
                                <p>Quản lý sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.product-attribute-group.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.product-attribute-group.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>Quản lý thuộc tính</p>
                            </a>
                        </li>

                    </ul>
                </li>

                @php
                    $routeNames = Route::currentRouteName();
                    $name = explode('.',$routeNames)[1];
                    $active = in_array($name,[
                    'orders','order-status','payment-status','shipping-status'
                    ]) ? 'active': null;
                        $open = ($active) ? 'menu-open' : null;
                @endphp
                <li class="nav-item has-treeview {{$open}}">
                    <a href="#"
                       class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Quản lý đơn hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.orders.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.orders.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-cart-arrow-down nav-icon"></i>
                                <p>Quản lý đơn hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.order-status.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.order-status.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-leaf nav-icon"></i>
                                <p>Trạng thái đơn hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.payment-status.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.payment-status.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-recycle nav-icon"></i>
                                <p>Trạng thái thanh toán</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.shipping-status.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.shipping-status.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-truck nav-icon"></i>
                                <p>Trạng thái vận chuyển</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @php
                    $routeNames = Route::currentRouteName();
                    $name = explode('.',$routeNames)[1];
                    $active = in_array($name,[
                    'users',
                    ]) ? 'active': null;
                        $open = ($active) ? 'menu-open' : null;
                @endphp
                <li class="nav-item has-treeview {{$open}}">
                    <a href="#"
                       class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Quản lý khách hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.users.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.users.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Quản lý khách hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @php
                    $routeNames = Route::currentRouteName();
                    $name = explode('.',$routeNames)[1];
                    $active = in_array($name,[
                    'posts','categories'
                    ]) ? 'active': null;
                        $open = ($active) ? 'menu-open' : null;
                @endphp
                <li class="nav-item has-treeview {{$open}}">
                    <a href="#"
                       class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Quản lý tin tức
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.posts.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.posts.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-book-open nav-icon"></i>
                                <p>Quản lý tin tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.categories.*') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH','cms').'.categories.index')}}"
                               class="nav-link {{$active}}">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Quản lý danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @php
                    $routeNames = Route::currentRouteName();
                    $name = explode('.',$routeNames)[1];
                    $active = in_array($name,[
                    'log-viewer'
                    ]) ? 'active': null;
                        $open = ($active) ? 'menu-open' : null;
                @endphp
                <li class="nav-item has-treeview {{$open}}">
                    <a href="#"
                       class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Cài đặt nâng cao cho lập trình viên
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH','cms').'.log-viewer.*') ? 'active': null;
                            @endphp
                            <a href="{{route('log-viewer::dashboard')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Log Viewer
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
