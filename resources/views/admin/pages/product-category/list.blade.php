@extends('admin.layouts.master')
@section('title_page','Danh sách danh mục sản phẩm')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{route(env('ADMIN_PATH').'.product-categories.create')}}">Thêm mới</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Action</th>
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Parent</th>
                        <th>Trạng thái</th>
                        <th>Ảnh</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productCategories as $key=>$productCategory)
                        @php
                            $editUrl = route(env('ADMIN_PATH') . '.product-categories.edit', $productCategory->id);
                            $deleteUrl = route(env('ADMIN_PATH') . '.product-categories.destroy', $productCategory->id);
                        @endphp
                        <tr>
                            <td>{{$productCategory->id}}</td>
                            <td>
                                @if(!$productCategory->isRoot())
                                    <a href="{{$editUrl}}" class="btn btn-outline-success"><i class="fa fa-pen"></i>
                                        Sửa</a>
                                    <form action='{{$deleteUrl}}' method='post'>
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit' class='btn btn-outline-danger delete-confirm'>Xóa
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>{{$productCategory->name}}</td>
                            <td>{{$productCategory->slug}}</td>
                            <td width="50px">{{$productCategory->description}}</td>
                            <td>{{optional($productCategory->parent)->name}}</td>
                            <td>{!! $productCategory->getStatusHtml() !!}</td>
                            <td><img height='50' width='50' src="{{$productCategory->image}}"/></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.closest('form').submit()
                    }
                })
            });
        });
    </script>
@endpush
