@extends('admin.layouts.master')
@section('title_page','Sửa nhóm quyền')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.roles.update',$role->id)}}">
                @csrf
                @method('PUT')
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
                @foreach($permissions as $group=>$permission)
                    <div class="form-group">
                        <label for="">{{$group}}</label>
                        <div class="row">
                            @foreach($permission as $per)
                                <div class="col-lg-3">
                                    @php
                                        $isSelected = in_array($per->id,$permissionIds) ? 'checked' : null;
                                    @endphp
                                    <input {{$isSelected}} class="form-check-inline" type="checkbox" name="quyens[]"
                                           value="{{$per->id}}"><label
                                            class="form-check-label" for="">{{$per->label}}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

@endpush
