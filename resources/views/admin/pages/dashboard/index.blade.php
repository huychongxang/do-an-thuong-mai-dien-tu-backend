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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">Đơn hàng trong 12 tháng</h3>
                </div>
                <div class="card-body table-responsive no-padding card-primary">
                    <div class="card">
                        <canvas id="chart-months-in-year" width="600" height="150"></canvas>
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
                                @foreach($newOrders as $order)
                                    <tr>
                                        <td>
                                            <a target="_blank"
                                               href="{{route(env('ADMIN_PATH','cmms').'.orders.edit',$order->id)}}">Order#{{$order->id}}</a>
                                        </td>
                                        <td>
                                            {{$order->email}}
                                        </td>
                                        <td>
                                            <span class="badge bg-{{$order->orderStatus->type}}">{{$order->orderStatus->label}}</span>
                                        </td>
                                        <td>
                                            {{$order->created_at}}
                                        </td>
                                    </tr>
                                @endforeach
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
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{route(env('ADMIN_PATH','cms').'.users.edit',$user->id)}}">ID#{{$user->id}}</a>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->full_name}}</td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                @endforeach

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

            var ctx_year = document.getElementById('chart-months-in-year').getContext('2d');
            new Chart(ctx_year, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    "labels":{!! $months1 !!},
                    "datasets": [
                        {
                            "label": "Tổng giá trị",
                            "data":{!! $arrTotalsAmount_year !!},
                            "fill": false,
                            "backgroundColor": [
                                "rgba(191, 25, 232, 0.2)",
                                "rgba(191, 25, 232, 0.2)",
                                "rgba(191, 25, 232, 0.2)",
                                "rgba(191, 25, 232, 0.2)",
                                "rgba(255, 99, 132, 0.2)",
                                "rgba(255, 159, 64, 0.2)",
                                "rgba(255, 205, 86, 0.2)",
                                "rgba(75, 192, 192, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                                "rgba(201, 203, 207, 0.2)",
                                "rgba(181, 147, 50, 0.2)",
                                "rgba(232, 130, 81, 0.2)",
                            ],
                            "borderColor": [
                                "rgb(191, 25, 232)",
                                "rgb(191, 25, 232)",
                                "rgb(191, 25, 232)",
                                "rgb(191, 25, 232)",
                                "rgb(255, 99, 132)",
                                "rgb(255, 159, 64)",
                                "rgb(255, 205, 86)",
                                "rgb(75, 192, 192)",
                                "rgb(54, 162, 235)",
                                "rgb(153, 102, 255)",
                                "rgb(201, 203, 207)",
                                "rgb(181, 147, 50)",
                                "rgb(232, 130, 81)",
                            ],
                            "borderWidth": 1,
                            type: "bar",
                        },
                        {
                            "label": "Tổng số tiền",
                            "data":{!! $arrTotalsAmount_year !!},
                            "fill": false,
                            "backgroundColor": "red",
                            "borderColor": "red",
                            "borderWidth": 1,
                            type: "line",
                        }
                    ]
                },
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
                    },
                    scales: {
                        yAxes: [
                            {
                                position: "left",
                                // id: "y-axis-amount",
                                ticks: {
                                    beginAtZero: true,
                                    callback: function (label, index, labels) {
                                        return format_number(label);
                                    },
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Việt Nam Đồng',
                                    fontSize: 15
                                }
                            }
                        ]
                    },
                },

            });
        });

        function format_number(n) {
            return n.toFixed(0).replace(/./g, function (c, i, a) {
                return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
            });
        }
    </script>

@endpush
