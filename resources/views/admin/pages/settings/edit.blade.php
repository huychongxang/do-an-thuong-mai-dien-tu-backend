@extends('admin.layouts.master')
@section('title_page','Sửa nhóm quyền')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.settings.update',$setting->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Gía trị</label>
                    <input type="text" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}"
                           name="value"
                           value="{{$setting->value}}"
                    >
                    @if($errors->has('value'))
                        <span class="error invalid-feedback">{{$errors->first('value')}}</span>
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
