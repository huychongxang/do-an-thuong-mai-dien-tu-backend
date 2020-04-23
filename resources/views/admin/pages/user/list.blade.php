@extends('admin.layouts.master')
@section('title_page','Danh sách khách hàng')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.users.create')}}">Thêm mới</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive no-padding">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Địa chỉ email</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ 1</th>
                        <th>Địa chỉ 2</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    {{$users->links()}}
                    <tbody>
                    @foreach($users as $key=>$user)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.users.edit', $user->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.users.destroy', $user->id);
                        @endphp
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->fullName}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address1}}</td>
                            <td>{{$user->address2}}</td>
                            <td>

                                <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                    Sửa</a>
                                <form action='{{$deleteUrl}}' method='post'>
                                    @csrf
                                    @method('DELETE')
                                    <a class='badge bg-danger delete-confirm'><i
                                                class="fa fa-times"></i> Xóa
                                    </a>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <small>Showing {{$users->firstItem()}} to {{$users->lastItem()}}
                        of {{$users->total()}} {{Str::plural('category',$users->total())}}</small>
                    {{$users->appends(request()->input())->links()}}

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
