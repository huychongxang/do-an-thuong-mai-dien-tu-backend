<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-olive">
    <!-- Brand Logo -->
    <a href="{{route(env('ADMIN_PATH').'.dashboard')}}" class="brand-link">
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

                <form id="logout-form" action="{{ route(env('ADMIN_PATH').'.logout') }}" method="POST">
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
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('log-viewer::dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Log Viewer
                        </p>
                    </a>
                </li>
                @php
                    $active = Route::is(env('ADMIN_PATH').'.product-categories*') ? 'active': null;
                    $open = ($active) ? 'menu-open' : null;
                @endphp
                <li class="nav-item has-treeview {{$open}}">
                    <a href="#"
                       class="nav-link {{$active}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH').'.product-categories.index') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH').'.product-categories.index')}}"
                               class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH').'.product.index') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH').'.product.index')}}"
                               class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @php
                                $active = Route::is(env('ADMIN_PATH').'.product-attribute-group.index') ? 'active': null;
                            @endphp
                            <a href="{{route(env('ADMIN_PATH').'.product-attribute-group.index')}}"
                               class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý thuộc tính</p>
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
