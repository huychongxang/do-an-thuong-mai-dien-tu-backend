@extends('admin.layouts.master')
@section('title_page','Sửa nhóm quyền')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.roles.update',$role->id)}}">
                @csrf
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}"
                           name="label"
                           value="{{$role->label}}"
                    >
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
