@extends('admin.layouts.master')
@section('title_page','Danh sách trạng thái')
@push('styles')

@endpush
@section('content')
    <div class="row">
        @can(\App\Models\ACL::PERMISSION_CREATE_ORDER_STATUS)
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.order-status.create')}}">Thêm mới</a>
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
                        <th>Type</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    {{$orderStatuses->links()}}
                    <tbody>
                    @foreach($orderStatuses as $key=>$orderStatus)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.order-status.edit', $orderStatus->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.order-status.destroy', $orderStatus->id);
                        @endphp
                        <tr>
                            <td>{{$orderStatus->id}}</td>
                            <td>{{$orderStatus->name}}</td>
                            <td>{{$orderStatus->label}}</td>
                            <td><span class="badge bg-{{$orderStatus->type}}"
                                      style="width: 20px;height: 20px;display: inline-block"></span></td>
                            <td>
                                @can(\App\Models\ACL::PERMISSION_EDIT_ORDER_STATUS)
                                    <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                        Sửa</a>
                                @endcan
                                @can(\App\Models\ACL::PERMISSION_DELETE_ORDER_STATUS)
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
                    <small>Showing {{$orderStatuses->firstItem()}} to {{$orderStatuses->lastItem()}}
                        of {{$orderStatuses->total()}} {{Str::plural('status',$orderStatuses->total())}}</small>
                    {{$orderStatuses->appends(request()->input())->links()}}
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
