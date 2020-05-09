@include('web.includes.header')
<!-- PRELOADER -->
@include('web.includes.preloader')
<!-- /PRELOADER -->

<!-- WRAPPER -->


<main class="wrapper" id="app">
    <!-- Header -->
@include('web.includes.header-navbar')
<!-- /Header -->
    <!-- CONTENT AREA -->
@yield('content')


<!-- / CONTENT AREA -->

    <!-- FOOTER -->
@include('web.includes.footer-block')
<!-- /FOOTER -->

    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

    <!-- Popup: Login Register -->
@guest
    @include('web.includes.popup-login-register')
@endguest
<!-- /Popup: Login Register -->

</main>
<!-- /WRAPPER -->

@include('web.includes.footer')
