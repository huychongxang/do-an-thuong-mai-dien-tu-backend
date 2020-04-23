@extends('admin.layouts.master')
@section('title_page','Danh sách nhóm thuộc tính')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.product-attribute-group.create')}}">Thêm
                mới</a>
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
                        <th>Tên</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    {{$attributes->links()}}
                    <tbody>
                    @foreach($attributes as $key=>$attribute)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.product-attribute-group.edit', $attribute->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.product-attribute-group.destroy', $attribute->id);
                        @endphp
                        <tr>
                            <td>{{$attribute->id}}</td>
                            <td>{{$attribute->name}}</td>
                            <td>{{$attribute->code}}</td>
                            <td>{{$attribute->type}}</td>
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
                    <small>Showing {{$attributes->firstItem()}} to {{$attributes->lastItem()}}
                        of {{$attributes->total()}} {{Str::plural('attribute',$attributes->total())}}</small>
                    {{$attributes->appends(request()->input())->links()}}

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
