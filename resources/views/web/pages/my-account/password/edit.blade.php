@extends('web.layouts.master')
@section('content')
    @include('web.includes.breadcrumbs',[
   'title1'=>null,
   'title2'=>null,
   'title3'=>'Tài khoản',
   'parent'=>[],
   'current'=>'Tài khoản'
   ])

    <article class="container theme-container">
        <div class="row">
            <!-- Sidebar Start -->
        @include('web.pages.my-account.sidebar')
        <!-- / Sidebar Ends -->
            <aside class="col-md-8 col-sm-8 space-bottom-45">
                <div class="account-details-wrap">
                    <div class="title-2 sub-title-small"> Đổi mật khẩu</div>
                    <div class="account-box  light-bg default-box-shadow">
                        <form action="{{route('page.password.update')}}" method="post" class="form-delivery">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group {{$errors->has('password') ? ' has-error': ''}}"><input
                                            name="password" class="form-control" type="password"
                                            placeholder="Password">
                                        @if($errors->has('password'))
                                            <span class="help-block">
                                             <strong>{{$errors->first('password')}}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div
                                        class="form-group {{$errors->has('password_confirmation') ? ' has-error': ''}}">
                                        <input name="password_confirmation" class="form-control"
                                               type="password"
                                               placeholder="Password Confirm">
                                        @if($errors->has('password_confirmation'))
                                            <span class="help-block">
                                             <strong>{{$errors->first('password_confirmation')}}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <label class="pink-btn btn">
                                        <input type="submit" value="Cập nhật">
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </aside>
        </div>
    </article>
@endsection
