@extends('admin.layouts.master')
@section('title_page','Sửa trạng thái thanh toán')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH').'.payment-status.update',$paymentStatus->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Mã</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                           value="{{$paymentStatus->name}}"
                    >
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}"
                           value="{{$paymentStatus->label}}"
                           name="label">
                    @if($errors->has('label'))
                        <span class="error invalid-feedback">{{$errors->first('label')}}</span>
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
