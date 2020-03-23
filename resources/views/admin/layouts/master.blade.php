@include('admin.includes.header')
@include('admin.includes.navbar')
@include('admin.includes.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">@yield('title_page','Starter Page')</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
@include('admin.includes.control-sidebar')
<!-- /.control-sidebar -->
@include('admin.includes.footer')
