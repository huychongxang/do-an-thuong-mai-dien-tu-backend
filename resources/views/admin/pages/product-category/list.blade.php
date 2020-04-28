@extends('admin.layouts.master')
@section('title_page','Danh sách danh mục sản phẩm')
@push('styles')

@endpush
@section('content')
    <div class="row">
        @can(\App\Models\ACL::PERMISSION_CREATE_PRODUCT_CATEGORY)
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.product-categories.create')}}">Thêm
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
                        <th>Tên</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Parent</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    {{$productCategories->links()}}
                    <tbody>
                    @foreach($productCategories as $key=>$productCategory)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.product-categories.edit', $productCategory->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.product-categories.destroy', $productCategory->id);
                        @endphp
                        <tr>
                            <td>{{$productCategory->id}}</td>
                            <td>{{$productCategory->name}}</td>
                            <td>{{$productCategory->slug}}</td>
                            <td width="50px">{{$productCategory->description}}</td>
                            <td>{{optional($productCategory->parent)->name}}</td>
                            <td>{!! $productCategory->getStatusHtml() !!}</td>
                            <td>
                                @if(!$productCategory->isRoot())
                                    @can(\App\Models\ACL::PERMISSION_EDIT_PRODUCT_CATEGORY)
                                        <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                            Sửa</a>
                                    @endcan
                                    @can(\App\Models\ACL::PERMISSION_DELETE_PRODUCT_CATEGORY)
                                        <form action='{{$deleteUrl}}' method='post'>
                                            @csrf
                                            @method('DELETE')
                                            <a class='badge bg-danger delete-confirm'><i
                                                        class="fa fa-times"></i> Xóa
                                            </a>
                                        </form>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <small>Showing {{$productCategories->firstItem()}} to {{$productCategories->lastItem()}}
                        of {{$productCategories->total()}} {{Str::plural('category',$productCategories->total())}}</small>
                    {{$productCategories->appends(request()->input())->links()}}

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
