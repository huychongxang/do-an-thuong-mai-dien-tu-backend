@extends('admin.layouts.master')
@section('title_page','Chi tiết đơn hàng')
@push('styles')
    <link href="{{asset('admin/x-editable/dist/bootstrap4-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header with-border">
                            <h3 class="card-title">Chi tiết đơn hàng #{{$order->id}}</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Tên:</td>
                                        <td>
                                            <a href="#" class="updateInfoRequired" data-name="first_name"
                                               data-type="text" data-pk="{{ $order->id }}"
                                               data-url="{{route(env('ADMIN_PATH').'.orders.update',$order->id)}}"
                                               data-title="  {{$order->first_name}}">  {{$order->first_name}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Họ:</td>
                                        <td><a href="#" class="updateInfoRequired" data-name="last_name"
                                               data-type="text" data-pk="{{ $order->id }}"
                                               data-url="{{route(env('ADMIN_PATH').'.orders.update',$order->id)}}"
                                               data-title="  {{$order->last_name}}">  {{$order->last_name}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại:</td>
                                        <td>
                                            <a href="#" class="updateInfoRequired" data-name="phone"
                                               data-type="text" data-pk="{{ $order->id }}"
                                               data-url="{{route(env('ADMIN_PATH').'.orders.update',$order->id)}}"
                                               data-title="{{$order->phone}}">  {{$order->phone}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{$order->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tỉnh/Thành:</td>
                                        <td>
                                            <a href="#" class="updateInfoRequired" data-name="address1"
                                               data-type="text" data-pk="{{ $order->id }}"
                                               data-url="{{route(env('ADMIN_PATH').'.orders.update',$order->id)}}"
                                               data-title="{{$order->address1}}">  {{$order->address1}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Quận/Huyện:</td>
                                        <td>
                                            <a href="#" class="updateInfoRequired" data-name="address2"
                                               data-type="text" data-pk="{{ $order->id }}"
                                               data-url="{{route(env('ADMIN_PATH').'.orders.update',$order->id)}}"
                                               data-title="{{$order->address2}}">  {{$order->address2}}</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Trạng thái đơn hàng:</td>
                                        <td>
                                            <a href="#" class="updateStatus" data-name="status" data-type="select"
                                               data-source="{{ json_encode($statusOrderMap) }}"
                                               data-pk="{{ $order->id }}" data-value="{!! $order->status !!}"
                                               data-url="{{route(env('ADMIN_PATH').'.orders.update',$order->id)}}"
                                               data-title=" {{$order->orderStatus->label}}"> {{$order->orderStatus->label}}</a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái vận chuyển:</td>
                                        <td>
                                            <a href="#" class="updateStatus" data-name="shipping_status"
                                               data-type="select"
                                               data-source="{{ json_encode($statusShippingMap) }}"
                                               data-pk="{{ $order->id }}"
                                               data-value="{!! $order->shipping_status !!}"
                                               data-url="{{route(env('ADMIN_PATH').'.orders.update',$order->id)}}"
                                               data-title="{{$order->shippingStatus->label}}">{{$order->shippingStatus->label}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Vận chuyển:</td>
                                        <td>{{$order->shipping_method}}</td>
                                    </tr>
                                    <tr>
                                        <td>Thanh toán:</td>
                                        <td>{{$order->payment_method}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <form id="form-add-item">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card collapsed-card">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Mã hàng</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($order->details as $item)
                                            <td>{{$item->name}}
                                                @php
                                                    $html = '';
                                                      if($item->attribute && is_array(json_decode($item->attribute,true))){
                                                        $array = json_decode($item->attribute,true);
                                                            foreach ($array as $key => $element){
                                                              $html .= '<br><b>'.$attributesGroup[$key].'</b> : <i>'.$element.'</i>';
                                                            }
                                                      }
                                                @endphp
                                                {!! $html !!}
                                            </td>
                                            <td>{{$item->sku}}</td>
                                            <td class="product_price"><a href="#" class="edit-item-detail"
                                                                         data-value="{{ $item->price }}"
                                                                         data-name="price" data-type="number" min=0
                                                                         data-pk="{{ $item->id }}"
                                                                         data-url="{{route(env('ADMIN_PATH').'.orders.edit-item',['orderId'=>$order->id,'itemId'=>$item->id])}}"
                                                                         data-title="Giá">{{ $item->price }}</a></td>
                                            <td class="product_qty">x <a href="#" class="edit-item-detail"
                                                                         data-value="{{ $item->quantity }}"
                                                                         data-name="quantity" data-type="number" min=0
                                                                         data-pk="{{ $item->id }}"
                                                                         data-url="{{route(env('ADMIN_PATH').'.orders.edit-item',['orderId'=>$order->id,'itemId'=>$item->id])}}"
                                                                         data-title="Số lượng"> {{ $item->quantity }}</a>
                                            </td>
                                            <td class="product_total item_id_{{ $item->id }}">{{ $item->total_price}}</td>
                                            <td>
                                                <button onclick="deleteItem({{ $item->id }});"
                                                        class="btn btn-danger btn-xs" data-title="Delete"><i
                                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                            </td>
                                        @endforeach

                                    </tr>
                                    <tr id="add-item" class="not-print">
                                        <td colspan="6">
                                            <button type="button" class="btn btn-sm btn-flat btn-success"
                                                    id="add-item-button"
                                            >
                                                <i class="fa fa-plus"></i>Thêm sản phẩm
                                            </button>
                                            <button style="display: none; margin-right: 50px" type="button"
                                                    class="btn btn-sm btn-flat btn-primary" id="add-item-button-save"
                                                    title="Save"><i class="fa fa-save"></i> Save
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Tiền hàng:</td>
                                            <td style="text-align:right" class="data-subtotal">{{$order->subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phí ship:</td>
                                            <td style="text-align:right">
                                                <a href="#" class="updatePrice data-shipping" data-name="shipping"
                                                   data-type="text"
                                                   data-pk="{{$order->id}}"
                                                   data-url="{{route(env('ADMIN_PATH').'.orders.update-price',$order->id)}}"
                                                   data-title=" {{$order->shipping}}"> {{$order->shipping}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Discount:</td>
                                            <td style="text-align:right">
                                                <a href="#" class="updatePrice data-discount" data-name="discount"
                                                   data-type="text"
                                                   data-pk="{{$order->id}}"
                                                   data-url="{{route(env('ADMIN_PATH').'.orders.update-price',$order->id)}}"
                                                   data-title=" {{$order->discount}}"> {{$order->discount}}</a>
                                            </td>
                                        </tr>
                                        <tr style="background:#f5f3f3;font-weight: bold;">
                                            <td>Total:</td>
                                            <td style="text-align:right" class="data-total">{{$order->total}}</td>
                                        </tr>
                                        <tr>
                                            <td>Đã nhận:</td>
                                            <td style="text-align:right">
                                                <a href="#" class="updatePrice data-received" data-name="received"
                                                   data-type="text"
                                                   data-pk="{{$order->id}}"
                                                   data-url="{{route(env('ADMIN_PATH').'.orders.update-price',$order->id)}}"
                                                   data-title=" {{$order->received}}"> {{$order->received}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Còn lại:</td>
                                            <td style="text-align:right" class="data-balance">{{$order->balance}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card collapsed-card">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="td-title">Ghi chú đơn hàng:</td>
                                                <td>
                                                    <a href="#" class="updatePrice" data-name="comment" data-type="text"
                                                       data-pk="{{$order->id}}"
                                                       data-url="{{route(env('ADMIN_PATH').'.orders.update',$order->id)}}"
                                                       data-title=" {{$order->comment}}"> {{$order->comment}}</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card collapsed-card">
                                        <div class="card-header with-border">
                                            <h3 class="card-title">Lịch sử đơn hàng</h3>
                                            <div class="card-tools pull-right">
                                                <button type="button" class="btn btn-card-tool" data-widget="collapse">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive no-padding card-primary">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th>Nhân viên</th>
                                                    <th>Nội dung</th>
                                                    <th>Thời gian</th>
                                                </tr>
                                                @foreach($histories as $history)
                                                    <tr>
                                                        <td>{{$history->admin->name ?? $history->user->name}}</td>
                                                        <td>{!! $history->content !!}</td>
                                                        <td>{{$history->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

    <script src="{{asset('/admin/x-editable/dist/bootstrap4-editable/js/bootstrap-editable.js')}}"></script>
    <script>
        $(document).ready(function () {
            all_editable();

            $('#add-item-button').click(function () {
                var html = '{!! $rowProductTemplate !!}';
                $('#add-item').before(html);
                $('.select2').select2();
                $('#add-item-button-save').show();
            });

            $('#add-item-button-save').click(function (event) {
                $('#add-item-button').prop('disabled', true);
                $('#add-item-button-save').button('loading');
                $.ajax({
                    url: '{{ route(env('ADMIN_PATH').".orders.add-item",$order->id) }}',
                    type: 'post',
                    dataType: 'json',
                    data: $('form#form-add-item').serialize(),
                    beforeSend: function () {
                        $('#loading').show();
                    },
                    success: function (result) {
                        $('#loading').hide();
                        if (parseInt(result.error) == 0) {
                            location.reload();
                        } else {
                            alert(result.msg);
                        }
                    }
                });
            });
        });

        function all_editable() {
            $.fn.editable.defaults.params = function (params) {
                params._token = "{{ csrf_token() }}";
                return params;
            };
            $.fn.editable.defaults.ajaxOptions = {type: "PUT"};

            $('.updateInfoRequired,.updateStatus').editable({
                validate: function (value) {
                    if (value == '') {
                        return 'Không được để trống';
                    }
                },
                success: function (response, newValue) {
                    if (response.success == true) {
                        return response.msg; //msg will be shown in editable form
                    }
                },
                error: function (response) {
                    var data = response.responseJSON;
                    return 'Có lỗi xảy ra';
                }
            });

            $('.updatePrice').editable({
                validate: function (value) {
                    if (value == '') {
                        return 'Không được để trống';
                    }
                },
                success: function (response, newValue) {
                    $('.data-shipping').html(response.data.shipping);
                    $('.data-received').html(response.datareceived);
                    $('.data-subtotal').html(response.data.subtotal);
                    $('.data-total').html(response.data.total);
                    $('.data-discount').html(response.data.discount);
                    $('.data-balance').html(response.data.balance);
                    return response.msg; //msg will be shown in editable form

                },
                error: function (response) {
                    var data = response.responseJSON;
                    return 'Có lỗi xảy ra';
                }
            });

            $('.edit-item-detail').editable({
                ajaxOptions: {
                    type: 'post',
                    dataType: 'json'
                },
                validate: function (value) {
                    if (value == '') {
                        return 'Không được để trống';
                    }
                    if (!$.isNumeric(value)) {
                        return 'Phải là kiểu số';
                    }
                },
                success: function (response, newValue) {
                    $('.data-shipping').html(response.data.shipping);
                    $('.data-received').html(response.datareceived);
                    $('.data-subtotal').html(response.data.subtotal);
                    $('.data-total').html(response.data.total);
                    $('.data-discount').html(response.data.discount);
                    $('.data-balance').html(response.data.balance);
                    $('.item_id_' + response.data.item_id).html(response.data.total_price);
                    return response.msg; //msg will be shown in editable form
                },
                error: function (response) {
                    var data = response.responseJSON;
                    return 'Có lỗi xảy ra';
                }
            });

        }

        {{-- sweetalert2 --}}
        function deleteItem(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to delete this item ?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                confirmButtonColor: "#DD6B55",
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,

                preConfirm: function () {
                    return new Promise(function (resolve) {
                        $.ajax({
                            method: 'post',
                            url: '{{ route(env('ADMIN_PATH').".orders.delete-item",$order->id) }}',
                            data: {
                                'itemId': id,
                                _token: '{{ csrf_token() }}',
                            },
                            success: function (data) {
                                location.reload();
                            }
                        });
                    });
                }

            }).then((result) => {
                if (result.value) {
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Item has been deleted.',
                        'success'
                    )
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    // swalWithBootstrapButtons.fire(
                    //   'Cancelled',
                    //   'Your imaginary file is safe :)',
                    //   'error'
                    // )
                }
            })
        }
        {{--/ sweetalert2 --}}


        //Add item
        function selectProduct(element) {
            node = element.closest('tr');
            var id = parseInt(node.find('option:selected').eq(0).val());
            if (id == 0) {
                node.find('.add_sku').val('');
                node.find('.add_qty').eq(0).val('');
                node.find('.add_price').eq(0).val('');
                node.find('.add_attr').html('');
            } else {
                $.ajax({
                    url: '{{ route(env('ADMIN_PATH').'.orders.get-product') }}',
                    type: "post",
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    beforeSend: function () {

                    },
                    success: function (result) {
                        var product = result.data.product;
                        node.find('.add_sku').val(product.sku);
                        node.find('.add_qty').eq(0).val(1);
                        node.find('.add_price').eq(0).val(product.price);
                        node.find('.add_total').eq(0).val(product.price);
                        node.find('.add_attr').eq(0).html();
                    }
                });
            }

        }
    </script>
@endpush
