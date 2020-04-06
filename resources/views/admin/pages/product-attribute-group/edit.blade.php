@extends('admin.layouts.master')
@section('title_page','Sửa thuộc tính')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH').'.product-attribute-group.update',$attribute->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                           placeholder="Enter name"
                           value="{{$attribute->name}}"
                    >
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code"
                           placeholder="Enter name"
                           value="{{$attribute->code}}"
                    >
                    @if($errors->has('code'))
                        <span class="error invalid-feedback">{{$errors->first('code')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Loại hiển thị</label>
                    <input type="radio" class="" name="type"
                           value="radio" {{$attribute->type == 'radio' ? 'checked' : null}}> Radio
                    <input type="radio" class="" name="type"
                           value="select" {{$attribute->type == 'select' ? 'checked' : null}}> Select
                    @if($errors->has('type'))
                        <span class="error invalid-feedback">{{$errors->first('type')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

@endpush
s
