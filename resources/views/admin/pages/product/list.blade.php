@extends('admin.layouts.master')
@section('title_page','Danh sách sản phẩm')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.product.create')}}">Thêm mới</a>
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
                        <th>Hình ảnh</th>
                        <th>Mã hàng</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Giá nhập</th>
                        <th>Giá bán</th>
                        <th>Loại</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    {{$products->links()}}
                    <tbody>
                    @foreach($products as $key=>$product)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.product.edit', $product->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.product.destroy', $product->id);
                        @endphp
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                <img alt="" title="" src="{{$product->image}}" style=" width:50px; height:50px;">
                            </td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->getCategoriesList()}}</td>
                            <td>{{$product->getCostHtml()}}</td>
                            <td>{{$product->getPriceHtml()}}</td>
                            <td>{{$product->getType()}}</td>
                            <td>{!! $product->getStatusHtml() !!}</td>
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
                    <small>Showing {{$products->firstItem()}} to {{$products->lastItem()}}
                        of {{$products->total()}} {{Str::plural('product',$products->total())}}</small>
                    {{$products->appends(request()->input())->links()}}

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
