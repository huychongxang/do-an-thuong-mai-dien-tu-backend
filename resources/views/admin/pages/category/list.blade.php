@extends('admin.layouts.master')
@section('title_page','Danh sách danh mục')
@push('styles')

@endpush
@section('content')
    <div class="row">
        @can(\App\Models\ACL::PERMISSION_CREATE_POST_CATEGORY)
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.categories.create')}}">Thêm mới</a>
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
                        <th>Số lượng bài viết</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $key=>$category)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.categories.edit', $category->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.categories.destroy', $category->id);
                        @endphp
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->posts->count()}}</td>
                            <td>
                                @can(\App\Models\ACL::PERMISSION_EDIT_POST_CATEGORY)
                                    <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                        Sửa</a>
                                @endcan
                                @can(\App\Models\ACL::PERMISSION_DELETE_POST_CATEGORY)
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
                    <small>Showing {{$categories->firstItem()}} to {{$categories->lastItem()}}
                        of {{$categories->total()}} {{Str::plural('category',$categories->total())}}</small>
                    {{$categories->appends(request()->input())->links()}}
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
