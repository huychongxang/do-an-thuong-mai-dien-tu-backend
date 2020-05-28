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
            <aside class="col-md-8 col-sm-8 space-bottom-20">
                <div class="account-details-wrap">
                    <div class="title-2 sub-title-small"> Sửa địa chỉ</div>
                    <div class="account-box  light-bg default-box-shadow">
                        <form action="{{route('page.address.update')}}" method="post" class="form-delivery">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><input name="address1" class="form-control" type="text"
                                                                   value="{{$user->address1}}" placeholder="Tỉnh/Thành">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><input name="address2" class="form-control" type="text"
                                                                   value="{{$user->address2}}" placeholder="Quận/Huyện">
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
