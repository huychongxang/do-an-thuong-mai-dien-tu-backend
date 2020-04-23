@extends('admin.layouts.master')
@section('title_page','Cập nhật khách hàng')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.users.update',$user->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                           name="first_name"
                           value="{{$user->first_name}}"
                    >
                    @if($errors->has('first_name'))
                        <span class="error invalid-feedback">{{$errors->first('first_name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Họ/ Đệm</label>
                    <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                           name="last_name"
                           value="{{$user->last_name}}"
                    >
                    @if($errors->has('last_name'))
                        <span class="error invalid-feedback">{{$errors->first('last_name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           name="email"
                           value="{{$user->email}}"
                    >
                    @if($errors->has('email'))
                        <span class="error invalid-feedback">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                           name="phone"
                           value="{{$user->phone}}"
                    >
                    @if($errors->has('phone'))
                        <span class="error invalid-feedback">{{$errors->first('phone')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Tỉnh/ Thành</label>
                    <input type="text" class="form-control {{ $errors->has('address1') ? 'is-invalid' : '' }}"
                           name="address1"
                           value="{{$user->address1}}"
                    >
                    @if($errors->has('address1'))
                        <span class="error invalid-feedback">{{$errors->first('address1')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Quận/ Huyện</label>
                    <input type="text" class="form-control {{ $errors->has('address2') ? 'is-invalid' : '' }}"
                           name="address2"
                           value="{{$user->address2}}"
                    >
                    @if($errors->has('address2'))
                        <span class="error invalid-feedback">{{$errors->first('address2')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="text" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           name="password">
                    <span class="help-block">
                         Để trống nếu không muốn thay đổi mật khẩu
                     </span>
                    @if($errors->has('password'))
                        <span class="error invalid-feedback">{{$errors->first('password')}}</span>
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
