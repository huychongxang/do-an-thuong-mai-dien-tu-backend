@extends('admin.layouts.master')
@section('title_page','Sửa quản trị viên')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.admins.update',$admin->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                           value="{{$admin->name}}"
                    >
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           name="email"
                           value="{{$admin->email}}"
                    >
                    @if($errors->has('email'))
                        <span class="error invalid-feedback">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           name="password">
                    <span>Nếu không thay đổi thì để trống</span>
                    @if($errors->has('password'))
                        <span class="error invalid-feedback">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Xác nhận mật khẩu</label>
                    <input type="password"
                           class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                           name="password_confirmation">
                    @if($errors->has('password_confirmation'))
                        <span class="error invalid-feedback">{{$errors->first('password_confirmation')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Chọn nhóm quyền</label>
                    <select class="form-control select2 {{ $errors->has('role_ids') ? 'is-invalid' : '' }}"
                            multiple="multiple" name="role_ids[]"
                            style="width: 100%;">
                        @foreach($roles as $role)
                            @php
                                $isSelected = (in_array($role->id,$currentRoleIds)) ? 'selected' : null;
                            @endphp
                            <option {{$isSelected}} value="{{$role->id}}">{{$role->label}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('role_ids'))
                        <span class="error invalid-feedback">{{$errors->first('role_ids')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Chọn quyền hạn</label>
                    <select class="form-control select2 "
                            multiple="multiple" name="permission_ids[]"
                            style="width: 100%;">
                        @foreach($permissions as $permission)
                            @php
                                $isSelected = (in_array($permission->id,$currentPermissionIds)) ? 'selected' : null;
                            @endphp
                            <option {{$isSelected}} value="{{$permission->id}}">{{$permission->label}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('permission_ids'))
                        <span class="error invalid-feedback">{{$errors->first('permission_ids')}}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')
    <script>
        $('.select2').select2({
            theme: "classic",
        });
    </script>
@endpush
