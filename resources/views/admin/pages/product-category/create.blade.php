@extends('admin.layouts.master')
@section('title_page','Thêm mới danh mục sản phẩm')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH').'.product-categories.store')}}"
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
                    <label for="">Mô tả</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Parent</label>
                    <select id=parent
                            class="form-control custom-select mt-15 {{ $errors->has('parent_id') ? 'is-invalid' : '' }}"
                            name="parent_id">
                        <option value="0">Select a parent category</option>
                        @foreach($parentCategories as $key => $category)
                            <option value="{{ $key }}">{{ $category }} </option>
                        @endforeach
                    </select>
                    @if($errors->has('parent_id'))
                        <span class="error invalid-feedback">{{$errors->first('parent_id')}}</span>
                    @endif
                </div>
                <div class="form-check">
                    <label>Trạng thái</label>
                    <input name="status" type="checkbox" checked data-toggle="toggle" data-onstyle="outline-success"
                           data-offstyle="outline-danger">
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

@endpush
