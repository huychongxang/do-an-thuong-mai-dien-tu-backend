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

            <!-- Posts Start -->
            <aside class="col-md-8 col-sm-8 space-bottom-20">
                <div class="title-wrap  text-center space-bottom-25">
                    <h2 class="section-title with-border">
                                <span class="white-bg">
                                    <span class="italic-font">Thông tin tài khỏan</span>
                                </span>
                    </h2>
                </div>
                <div class="account-details-wrap">
                    <div class="account-box  light-bg default-box-shadow">
                        <form action="#" class="form-delivery">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group"><input type="text" class="form-control"
                                                                   placeholder="Tên" required=""
                                                                   value="{{$user->first_name}}"></div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group"><input type="text" class="form-control"
                                                                   value="{{$user->last_name}}"
                                                                   placeholder="Họ Đệm" required=""></div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group"><input value="{{$user->email}}" type="email" class="form-control" placeholder="Email"
                                                                   required=""></div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group"><input value="{{$user->phone}}" type="text" class="form-control"
                                                                   placeholder="SĐT" required=""></div>
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
            <!-- Posts Ends -->
        </div>
    </article>
@endsection
