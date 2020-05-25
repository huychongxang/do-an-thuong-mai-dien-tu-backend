@extends('web.layouts.master')
@section('content')
    <!-- Main Slider Start -->
    @include('web.includes.home.main-slider')
    <!-- / Main Slider Ends -->

    <!-- Category Start -->
    @include('web.includes.home.category-start')
    <!-- / Category Ends -->

    <!-- Product Most Popular Start -->
    @include('web.includes.home.product-most-popular-start')
    <!-- / Product Most Popular Ends -->

    <!-- Newsletter Start -->
    @include('web.includes.home.newsletter-form')
    <!-- / Newsletter Ends -->

    <!-- Blog Start -->
    @include('web.includes.home.new-blog')
    <!-- / Blog Ends -->


    <!-- Brands Slider Start -->
    @include('web.includes.home.brands-slider')
    <!-- / Brands Slider Ends -->
@endsection

