@extends('web.layouts.master')
@section('content')
    <!-- Main Slider Start -->
    @include('web.includes.main-slider')
    <!-- / Main Slider Ends -->

    <!-- Personalize Results Start -->
    @include('web.includes.personalize-result')
    <!-- / Personalize Results Ends -->

    <!-- Category Start -->
    @include('web.includes.category-start')
    <!-- / Category Ends -->


    <!-- Filter & All Fashion 1 Start -->
    @include('web.includes.filter-all-fashion-1')
    <!-- / Filter & All Fashion 1 Ends -->

    <!-- Product Most Popular Start -->
    @include('web.includes.product-most-popular-start')
    <!-- / Product Most Popular Ends -->


    <!-- Special Offers Start -->
    @include('web.includes.special-offers')
    <!-- / Special Offers Ends -->

    <!-- Filter & All Fashion 2 Start -->
    @include('web.includes.filter-all-fashion-2')
    <!-- / Filter & All Fashion 2 Ends -->


    <!-- Product Best Sellers Start -->
    @include('web.includes.product-best-sellers')
    <!-- / Product Best Sellers Ends -->


    <!-- Newsletter Start -->
    @include('web.includes.newsletter-form');
    <!-- / Newsletter Ends -->


    <!-- Filter & All Fashion 3 Start -->
    @include('web.includes.filter-all-fashion-3')
    <!-- / Filter & All Fashion 3 Ends -->


    <!-- Product Latest Items Start -->
    @include('web.includes.product-latest-items')
    <!-- / Product Latest Items Ends -->


    <!-- Blog Start -->
    @include('web.includes.new-blog')
    <!-- / Blog Ends -->


    <!-- Brands Slider Start -->
    @include('web.includes.brands-slider')
    <!-- / Brands Slider Ends -->


    <!-- Testimonials Slider Start -->
    @include('web.includes.testimonials')
    <!-- / Testimonials Slider Ends -->
@endsection
