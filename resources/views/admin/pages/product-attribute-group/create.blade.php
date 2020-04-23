@extends('admin.layouts.master')
@section('title_page','Thêm mới thuộc tính')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.product-attribute-group.store')}}">
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
                    <label for="">Code</label>
                    <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code"
                           placeholder="Enter name">
                    @if($errors->has('code'))
                        <span class="error invalid-feedback">{{$errors->first('code')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Loại hiển thị</label>
                    <input type="radio" class="" name="type" value="radio" checked> Radio
                    <input type="radio" class="" name="type" value="select"> Select
                    @if($errors->has('type'))
                        <span class="error invalid-feedback">{{$errors->first('type')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

@endpush
