@extends('admin.layouts.master')
@section('title_page','Trang quản trị')
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Thống kê đơn hàng</span>
                    <span class="info-box-number">{{number_format($totalOrders)}}</span>
                    <a href="{{route(env('ADMIN_PATH','cms').'.orders.index')}}" class="small-box-footer">
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
                    <span class="info-box-number">{{number_format($totalProducts)}}</span>
                    <a href="{{route(env('ADMIN_PATH','cms').'.product.index')}}" class="small-box-footer">
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
                    <span class="info-box-number">{{number_format($totalUsers)}}</span>
                    <a href="{{route(env('ADMIN_PATH','cms').'.users.index')}}" class="small-box-footer">
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
                    <span class="info-box-text">Thống kê bài viết</span>
                    <span class="info-box-number">{{number_format($totalPosts)}}</span>
                    <a href="{{route(env('ADMIN_PATH','cms').'.posts.index')}}" class="small-box-footer">
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
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">Đơn hàng mới</h3>
                </div>
                <div class="card-body table-responsive no-padding">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="">Order#1</a>
                                    </td>
                                    <td>
                                        vuhuydung88@gmail.com
                                    </td>
                                    <td>
                                        <span class="label label-info">Mới</span>
                                    </td>
                                    <td>
                                        2020-03-31 15:39:26
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        Khách hàng mới
                    </h3>
                </div>
                <div class="card-body table-responsive no-padding">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Địa chỉ Email</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tạo lúc</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="">ID#1</a>
                                    </td>
                                    <td>test@test.com</td>
                                    <td>Huy</td>
                                    <td>2019-12-05 21:17:55</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
            new Chart(ctx_month, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    // type: 'category',
                    labels: {!! $arrDays !!},
                    datasets: [
                        {
                            label: "Tổng giá trị",
                            backgroundColor: 'rgba(225,0,0,0.4)',
                            borderColor: "#dd4b39",
                            borderCapStyle: 'square',
                            pointHoverRadius: 8,
                            pointHoverBackgroundColor: "yellow",
                            pointHoverBorderColor: "brown",
                            data: {!! $arrTotalsAmount !!},
                            showLine: true, // disable for a single dataset,
                            yAxisID: "y-axis-gravity",
                            fill: false,
                            type: 'line',
                            lineTension: 0.1,
                        },
                        {
                            label: "Tổng đơn hàng",
                            backgroundColor: '#00b894',
                            borderColor: 'rgb(138, 199, 214)',
                            pointHoverRadius: 8,
                            pointHoverBackgroundColor: "brown",
                            pointHoverBorderColor: "yellow",
                            data: {!! $arrTotalsOrder !!},
                            showLine: true, // disable for a single dataset,
                            yAxisID: "y-axis-density",
                            spanGaps: true,
                            lineTension: 0.1,

                        },

                    ]
                },

                // Configuration options go here
                options: {
                    responsive: true,
                    legend: {
                        display: true,
                    },
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 0,
                            bottom: 0
                        }
                    },
                    scales: {
                        yAxes: [
                            {
                                position: "left",
                                id: "y-axis-density",
                                ticks: {
                                    beginAtZero: true,
                                    max: {!! $max_order  !!} +5,
                                    min: 0,
                                    stepSize: 1,
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Tổng đơn hàng',
                                    fontSize: 15,

                                }
                            },
                            {
                                position: "right",
                                id: "y-axis-gravity",
                                ticks: {
                                    beginAtZero: true,
                                    callback: function (label, index, labels) {
                                        return format_number(label);
                                    },
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Tổng giá trị',
                                    fontSize: 15
                                }
                            }
                        ]
                    },

                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].label || '';

                                if (label) {
                                    label += ': ';
                                }
                                label += format_number(tooltipItem.yLabel);
                                return label;
                            }
                        }
                    }
                }
            });
        });

        function format_number(n) {
            return n.toFixed(0).replace(/./g, function (c, i, a) {
                return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
            });
        }
    </script>

@endpush
