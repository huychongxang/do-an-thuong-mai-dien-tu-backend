@if (Session::has('alert.config'))
    @if(config('sweetalert.animation.enable'))

    @endif
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif
