@extends('admin.layouts.master')
@section('title_page','Tạo đơn hàng')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.orders.store')}}">
                @csrf
                <div class="form-group">
                    <label for="">Vui lòng chọn khách hàng</label>
                    <select class="form-control select2" style="width: 100%;" name="user_id">
                        <option value=""></option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}&lt;{{$user->email}}&gt;</option>
                        @endforeach

                    </select>
                    @if($errors->has('user_id'))
                        <span class="error invalid-feedback">{{$errors->first('user_id')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                           name="first_name">
                    @if($errors->has('first_name'))
                        <span class="error invalid-feedback">{{$errors->first('first_name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Họ</label>
                    <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                           name="last_name">
                    @if($errors->has('last_name'))
                        <span class="error invalid-feedback">{{$errors->first('last_name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Tỉnh/Thành</label>
                    <input type="text" class="form-control {{ $errors->has('address1') ? 'is-invalid' : '' }}"
                           name="address1">
                    @if($errors->has('address1'))
                        <span class="error invalid-feedback">{{$errors->first('address1')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Quận/Huyện</label>
                    <input type="text" class="form-control {{ $errors->has('address2') ? 'is-invalid' : '' }}"
                           name="address2">
                    @if($errors->has('address2'))
                        <span class="error invalid-feedback">{{$errors->first('address2')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                           name="phone">
                    @if($errors->has('phone'))
                        <span class="error invalid-feedback">{{$errors->first('phone')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           name="email">
                    @if($errors->has('email'))
                        <span class="error invalid-feedback">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Ghi chú</label>
                    <textarea name="comment"
                              class="form-control comment {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="5"
                              placeholder=""></textarea>
                    @if($errors->has('comment'))
                        <span class="error invalid-feedback">{{$errors->first('comment')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Thanh toán</label>
                    <select class="form-control select2" style="width: 100%;" name="payment_method">
                        <option value="Cash">Thanh toán tiền mặt</option>
                    </select>
                    @if($errors->has('payment_method'))
                        <span class="error invalid-feedback">{{$errors->first('payment_method')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Vận chuyển</label>
                    <select class="form-control select2" style="width: 100%;" name="shipping_method">
                        <option value="ShippingStandard">Shipping Standard</option>
                    </select>
                    @if($errors->has('shipping_method'))
                        <span class="error invalid-feedback">{{$errors->first('shipping_method')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select class="form-control select2" style="width: 100%;" name="status">
                        @foreach($orderStatues as $orderStatus)
                            <option value="{{$orderStatus->id}}">{{$orderStatus->label}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('status'))
                        <span class="error invalid-feedback">{{$errors->first('status')}}</span>
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
