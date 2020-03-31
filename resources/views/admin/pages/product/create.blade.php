@extends('admin.layouts.master')
@section('title_page','Thêm mới sản phẩm')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH').'.product.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                           placeholder="Enter name">
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Sku - Mã hàng</label>
                    <input type="text" class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}" name="sku"
                           placeholder="Enter Sku">
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('sku')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Parent</label>
                    <select class="form-control" name="parent_id">

                    </select>
                </div>
                <div class="form-check">
                    <label>Trạng thái</label>
                    <input name="status" type="checkbox" checked data-toggle="toggle" data-onstyle="outline-success"
                           data-offstyle="outline-danger">
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <input type="file" class="form-control-file" name="image"
                           accept="image/*"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

@endpush
