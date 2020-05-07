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
@push('scripts')
    <script>
        $(function () {
            $("body").on("click", '.addcart', function (event) {
                event.preventDefault();
                @guest
                $('#login-register').modal('show');
                return false;
                    @endguest
                var id = $(this).data('id');
                add(id);
            });
        });

        function add(id) {
            request = $.ajax({
                url: '{{route('api-web.add-cart')}}',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                }
            });

            request.done(function (response, textStatus, jqXHR) {
                if (response.code == 200) {
                    var data = response.data;
                    document.getElementById('header-cart-total').innerHTML = "<strong> (" + data.count + ")</strong>";
                    document.getElementById('header-cart-subtotal').innerHTML = "<b> " + data.subtotal + " </b>";
                    var contents = data.content;
                    document.getElementById('header-cart-body').innerHTML = contents;
                }
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
                // Log the error to the console
                console.error(
                    "The following error occurred: " +
                    textStatus, errorThrown
                );
            });
        }
    </script>
@endpush
