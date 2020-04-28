@extends('admin.layouts.master')
@section('title_page','Danh sách quản trị viên')
@push('styles')
    <style>
        .bg-success {
            margin-right: 4%;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        @can(\App\Models\ACL::PERMISSION_CREATE_ADMIN)
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.admins.create')}}">Thêm mới</a>
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
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Nhóm quyền</th>
                        <th>Quyền hạn</th>
                        <th>Tạo lúc</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    {{$admins->links()}}
                    <tbody>
                    @foreach($admins as $key=>$admin)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.admins.edit', $admin->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.admins.destroy', $admin->id);
                        @endphp
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{!! $admin->getRolesHtml() !!}</td>
                            <td>{!!  $admin->getPermissionsHtml()!!}</td>
                            <td>{{$admin->created_at}}</td>
                            <td>
                                @can(\App\Models\ACL::PERMISSION_EDIT_ADMIN)
                                    <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                        Sửa</a>
                                @endcan
                                @can(\App\Models\ACL::PERMISSION_DELETE_ADMIN)
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
                    <small>Showing {{$admins->firstItem()}} to {{$admins->lastItem()}}
                        of {{$admins->total()}} {{Str::plural('status',$admins->total())}}</small>
                    {{$admins->appends(request()->input())->links()}}
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
