@include('web.includes.header')
<!-- PRELOADER -->
@include('web.includes.preloader')
<!-- /PRELOADER -->

<!-- WRAPPER -->


<main class="wrapper">
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


    <!-- Newsletter Popup-->

    <!-- / Newsletter -->

    <!-- Preview Popup -->
@include('web.includes.modal-preview-product')
<!-- / Preview Popup -->

    <!-- Popup: Login Register -->
@include('web.includes.popup-login-register')
<!-- /Popup: Login Register -->

</main>
<!-- /WRAPPER -->

@include('web.includes.footer')