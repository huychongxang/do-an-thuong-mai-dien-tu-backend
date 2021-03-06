@extends('admin.layouts.master')
@section('title_page','Danh sách nhóm quyền')
@push('styles')

@endpush
@section('content')
    <div class="row">
        @can(\App\Models\ACL::PERMISSION_CREATE_ROLE)
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.roles.create')}}">Thêm mới</a>
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
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    {{$roles->links()}}
                    <tbody>
                    @foreach($roles as $key=>$role)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.roles.edit', $role->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.roles.destroy', $role->id);
                        @endphp
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->label}}</td>
                            <td>
                                @if(!$role->is_default && auth()->user()->can(\App\Models\ACL::PERMISSION_EDIT_ROLE))
                                    <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                        Sửa</a>
                                @endif
                                @if(!$role->is_default && auth()->user()->can(\App\Models\ACL::PERMISSION_DELETE_ROLE))
                                    <form action='{{$deleteUrl}}' method='post'>
                                        @csrf
                                        @method('DELETE')
                                        <a class='badge bg-danger delete-confirm'><i
                                                    class="fa fa-times"></i> Xóa
                                        </a>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <small>Showing {{$roles->firstItem()}} to {{$roles->lastItem()}}
                        of {{$roles->total()}} {{Str::plural('status',$roles->total())}}</small>
                    {{$roles->appends(request()->input())->links()}}
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
