@extends('web.layouts.master')
@section('content')
    @include('web.includes.breadcrumbs',[
   'title1'=>null,
   'title2'=>null,
   'title3'=>'Tạo đơn hàng thành công',
   'parent'=>[],
   'current'=>''
   ])
    <h1 style="text-align: center">Đơn hàng của bạn đã được gửi</h1>
    <br>
    <br>
@endsection
