@extends('admin.layouts.master')
@section('title_page','Danh sách trạng thái thanh toán')
@push('styles')

@endpush
@section('content')
    <div class="row">
        @can(\App\Models\ACL::PERMISSION_CREATE_PAYMENT_STATUS)
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.payment-status.create')}}">Thêm
                    mới</a>
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
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    {{$paymentStatuses->links()}}
                    <tbody>
                    @foreach($paymentStatuses as $key=>$paymentStatus)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.payment-status.edit', $paymentStatus->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.payment-status.destroy', $paymentStatus->id);
                        @endphp
                        <tr>
                            <td>{{$paymentStatus->id}}</td>
                            <td>{{$paymentStatus->name}}</td>
                            <td>{{$paymentStatus->label}}</td>
                            <td>
                                @can(\App\Models\ACL::PERMISSION_EDIT_PAYMENT_STATUS)
                                    <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                        Sửa</a>
                                @endcan
                                @can(\App\Models\ACL::PERMISSION_DELETE_PAYMENT_STATUS)
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
                    <small>Showing {{$paymentStatuses->firstItem()}} to {{$paymentStatuses->lastItem()}}
                        of {{$paymentStatuses->total()}} {{Str::plural('status',$paymentStatuses->total())}}</small>
                    {{$paymentStatuses->appends(request()->input())->links()}}
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
