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

            $("body").on("click", '.delete-row-item', function (event) {
                event.preventDefault();
                @guest
                $('#login-register').modal('show');
                return false;
                    @endguest
                var id = $(this).data('id');
                var rowId = $(this).data('row');
                remove(rowId, id);
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

        function remove(rowId, id) {
            request = $.ajax({
                url: '{{route('api-web.remove-item')}}',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    row: rowId,
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
