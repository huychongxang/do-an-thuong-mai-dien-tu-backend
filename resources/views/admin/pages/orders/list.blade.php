@extends('admin.layouts.master')
@section('title_page','Danh sách đơn hàng')
@push('styles')

@endpush
@section('content')
    <div class="row">
        @can(\App\Models\ACL::PERMISSION_CREATE_ORDER)
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.orders.create')}}">Thêm mới</a>
            </div>
        @endcan
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive no-padding">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Tiền hàng</th>
                        <th>Vận chuyển</th>
                        <th>Giảm giá</th>
                        <th>Tổng</th>
                        <th>Hình thức thanh toán</th>
                        <th>Hình thức ship</th>
                        <th>Trạng thái</th>
                        <th>Tạo lúc</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    {{$orders->links()}}
                    <tbody>
                    @foreach($orders as $key=>$order)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.orders.edit', $order->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.orders.destroy', $order->id);
                        @endphp
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->subtotal}}</td>
                            <td>{{$order->shipping}}</td>
                            <td>{{$order->discount}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->paymentMethod->label}}</td>
                            <td>{{$order->shippingMethod->label}}</td>
                            <td>
                                <span
                                    class="badge bg-{{$order->orderStatus->type}}">{{$order->orderStatus->label}}</span>
                            </td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                @can(\App\Models\ACL::PERMISSION_EDIT_ORDER)
                                    <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                        Sửa</a>
                                @endcan
                                @can(\App\Models\ACL::PERMISSION_DELETE_ORDER)
                                    <form action='{{$deleteUrl}}' method='post'>
                                        @csrf
                                        @method('DELETE')
                                        <a class='badge bg-danger delete-confirm'><i
                                                class="fa fa-times"></i> Xóa
                                        </a>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <small>Showing {{$orders->firstItem()}} to {{$orders->lastItem()}}
                        of {{$orders->total()}} {{Str::plural('status',$orders->total())}}</small>
                    {{$orders->appends(request()->input())->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')
    <script>
        $(function () {
            $('body').on('click', '.delete-confirm', function (e) {
                event.preventDefault();
                Swal.fire({
                    title: 'Bạn chắc chắn muốn xóa chứ',
                    text: "Không thể khôi phục lại được",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Thoát',
                    confirmButtonText: 'Đúng, tôi muốn xóa'
                }).then((result) => {
                    if (result.value) {
                        this.closest('form').submit()
                    }
                })
            });
        });
    </script>
@endpush
