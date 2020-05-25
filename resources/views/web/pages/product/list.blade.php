@extends('web.layouts.master')
@section('content')
    @include('web.includes.breadcrumbs',[
   'title1'=>null,
   'title2'=>null,
   'title3'=>'Sản phẩm',
   'parent'=>[],
   'current'=>'Danh sách sản phẩm'
   ])
    <products-component></products-component>
@endsection
