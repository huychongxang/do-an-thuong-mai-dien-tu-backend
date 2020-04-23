@extends('admin.layouts.master')
@section('title_page','Danh sách trạng thái ship')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.shipping-status.create')}}">Thêm mới</a>
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
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    {{$shippingStatuses->links()}}
                    <tbody>
                    @foreach($shippingStatuses as $key=>$shippingStatus)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.shipping-status.edit', $shippingStatus->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.shipping-status.destroy', $shippingStatus->id);
                        @endphp
                        <tr>
                            <td>{{$shippingStatus->id}}</td>
                            <td>{{$shippingStatus->name}}</td>
                            <td>{{$shippingStatus->label}}</td>
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
                    <small>Showing {{$shippingStatuses->firstItem()}} to {{$shippingStatuses->lastItem()}}
                        of {{$shippingStatuses->total()}} {{Str::plural('status',$shippingStatuses->total())}}</small>
                    {{$shippingStatuses->appends(request()->input())->links()}}
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
