<div class="modal fade login-register" id="login-register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>

        <div class="modal-content light-bg">
            <div class="col-sm-8">
                <div class="title-wrap">
                    <h2 class="section-title">
                                    <span>
                                        <span class="funky-font blue-tag">Welcome</span>
                                        <span class="italic-font">to the Baby & kids Store</span>
                                    </span>
                    </h2>
                    <h3 class="sub-title">Đăng nhập hoặc đăng ký</h3>
                    <hr class="dash-divider-small">
                </div>
            </div>

            <div class="col-sm-6 col-md-5">
                <div class="login-wrap">
                    <h2 class="title-2 sub-title-small">Đăng nhập</h2>
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email"
                                   class="form-control {{ $errors->has('email') ? 'has-error has-danger' : '' }}"
                                   required/>
                            <i class="blue-color fa fa-user"></i>
                            @if($errors->has('email'))
                                <div class="help-block with-errors">
                                    <ul class="list-unstyled" style="color: red">
                                        <li>{{$errors->first('email')}}</li>
                                    </ul>
                                </div>

                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Mật khẩu"
                                   class="form-control {{ $errors->has('password') ? 'has-error has-danger' : '' }}"
                                   required/>
                            <i class="pink-color fa  fa-unlock-alt"></i>
                            @if($errors->has('password'))
                                <span class="error invalid-feedback">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="chk-box"><input type="checkbox" name="remember">Ghi nhớ tôi</label>
                            <label class="forgot-pwd">
                                <a href="#" class="blue-color title-link">Quên mật khẩu?</a>
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="blue-btn btn">Đăng nhập</button>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('login_third','facebook')}}" class="btn btn-primary"><i
                                            class="fa fa-facebook"></i> Facebook</a>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('login_third','google')}}" class="btn btn-danger"><i class="fa fa-google"></i> Google</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="register-wrap">
                    <h2 class="title-2 sub-title-small">Người dùng mới?</h2>
                    <p class="italic-font">Đăng ký miễn phí và nhanh gọn</p>
                    <ul>
                        <li>Thanh toán tiện hơn</li>
                        <li>Xem và quản lý lịch sử đơn hàng</li>
                    </ul>
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email"
                                   class="form-control {{ $errors->has('email') ? 'has-error has-danger' : '' }}"
                                   required/>
                            @if($errors->has('email'))
                                <div class="help-block with-errors">
                                    <ul class="list-unstyled" style="color: red">
                                        <li>{{$errors->first('email')}}</li>
                                    </ul>
                                </div>

                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Mật khẩu"
                                   class="form-control {{ $errors->has('password') ? 'has-error has-danger' : '' }}"
                                   required/>
                            @if($errors->has('password'))
                                <span class="error invalid-feedback">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="pink-btn btn">Tạo tài khoản</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(window).on('load', function () {
            @if($errors->any())
            $('#login-register').modal('show');
            @endif
        });
    </script>
@endpush
