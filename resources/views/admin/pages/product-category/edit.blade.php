@extends('admin.layouts.master')
@section('title_page','Sửa danh mục sản phẩm')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.product-categories.update',$productCategory->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                           value="{{$productCategory->name}}"
                           placeholder="Enter name">
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea type="text" class="form-control"
                              name="description">{{$productCategory->description}}</textarea>
                </div>
                <div class="form-check">
                    <label>Trạng thái</label>
                    <?php
                    $idOn = $productCategory->status == 1 ? 'checked' : '';
                    ?>
                    <input name="status" type="checkbox" {{$idOn}} data-toggle="toggle" data-onstyle="outline-success"
                           data-offstyle="outline-danger">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

@endpush
