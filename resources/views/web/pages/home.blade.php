@extends('web.layouts.master')
@section('content')
    <!-- Main Slider Start -->
    @include('web.includes.home.main-slider')
    <!-- / Main Slider Ends -->

    <!-- Personalize Results Start -->
    @include('web.includes.home.personalize-result')
    <!-- / Personalize Results Ends -->

    <!-- Category Start -->
    @include('web.includes.home.category-start')
    <!-- / Category Ends -->


    <!-- Filter & All Fashion 1 Start -->
    @include('web.includes.home.filter-all-fashion-1')
    <!-- / Filter & All Fashion 1 Ends -->

    <!-- Product Most Popular Start -->
    @include('web.includes.home.product-most-popular-start')
    <!-- / Product Most Popular Ends -->


    <!-- Special Offers Start -->
    @include('web.includes.home.special-offers')
    <!-- / Special Offers Ends -->

    <!-- Filter & All Fashion 2 Start -->
    @include('web.includes.home.filter-all-fashion-2')
    <!-- / Filter & All Fashion 2 Ends -->


    <!-- Product Best Sellers Start -->
    @include('web.includes.home.product-best-sellers')
    <!-- / Product Best Sellers Ends -->


    <!-- Newsletter Start -->
    @include('web.includes.home.newsletter-form');
    <!-- / Newsletter Ends -->


    <!-- Filter & All Fashion 3 Start -->
    @include('web.includes.home.filter-all-fashion-3')
    <!-- / Filter & All Fashion 3 Ends -->


    <!-- Product Latest Items Start -->
    @include('web.includes.home.product-latest-items')
    <!-- / Product Latest Items Ends -->


    <!-- Blog Start -->
    @include('web.includes.home.new-blog')
    <!-- / Blog Ends -->


    <!-- Brands Slider Start -->
    @include('web.includes.home.brands-slider')
    <!-- / Brands Slider Ends -->


    <!-- Testimonials Slider Start -->
    @include('web.includes.home.testimonials')
    <!-- / Testimonials Slider Ends -->
@endsection
