@extends('admin.layouts.master')
@section('title_page','Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Thống kê đơn hàng</span>
                    <span class="info-box-number">2</span>
                    <a href="http://s-cart.personal.local/cms/order" class="small-box-footer">
                        Nhiều hơn&nbsp;
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Thống kê sản phẩm</span>
                    <span class="info-box-number">17</span>
                    <a href="http://s-cart.personal.local/cms/product" class="small-box-footer">
                        Nhiều hơn&nbsp;
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Thống kê khách hàng</span>
                    <span class="info-box-number">1</span>
                    <a href="http://s-cart.personal.local/cms/customer" class="small-box-footer">
                        Nhiều hơn&nbsp;
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-map-signs"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Thống kê blog</span>
                    <span class="info-box-number">1</span>
                    <a href="http://s-cart.personal.local/cms/news" class="small-box-footer">
                        Nhiều hơn&nbsp;
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">Đơn hàng trong 30 ngày</h3>
                </div>
                <div class="card-body table-responsive no-padding card-primary">
                    <div class="card">
                        <canvas id="chart-days-in-month" width="700" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function ($) {
            var ctx_month = document.getElementById('chart-days-in-month').getContext('2d');
            
        });
    </script>

@endpush
