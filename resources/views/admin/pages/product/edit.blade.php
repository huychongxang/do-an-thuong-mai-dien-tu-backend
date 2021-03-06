@extends('admin.layouts.master')
@section('title_page','Sửa sản phẩm')
@push('styles')
    <link rel="stylesheet"
          href="{{asset('admin/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('admin/css/upload-image.css')}}">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.product.update',$product->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                           placeholder="Enter name"
                           value="{{$product->name}}"
                    >
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Sku - Mã hàng</label>
                    <input type="text" class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}" name="sku"
                           placeholder="Enter Sku"
                           value="{{$product->sku}}"
                    >
                    @if($errors->has('sku'))
                        <span class="error invalid-feedback">{{$errors->first('sku')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                              name="description">{{$product->description}}</textarea>
                    @if($errors->has('description'))
                        <span class="error invalid-feedback">{{$errors->first('description')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea type="text" id="mytextarea"
                              class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                              name="content">{!! $product->content !!}</textarea>
                    @if($errors->has('content'))
                        <span class="error invalid-feedback">{{$errors->first('content')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    @php
                        $listCate = [];
                        $currentCategories = $product->categories->pluck('id')->toArray();
                        if(is_array($currentCategories)){
                            foreach($currentCategories as $category){
                                $listCate[] = (int)$category;
                            }
                        }
                    @endphp
                    <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}"
                            multiple="multiple" name="categories[]"
                            style="width: 100%;">
                        @foreach($categories as $key=>$category)
                            @php
                                $isSelected = in_array($category->id, $listCate) ? 'selected': null ;
                            @endphp
                            <option value="{{$category->id}}" {{ $isSelected }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('categories'))
                        <span class="error invalid-feedback">{{$errors->first('categories')}}</span>
                    @endif
                </div>
                <div class="form-group up-anh">
                    <label for="">Ảnh</label>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2 imgUp">
                                <div class="imagePreview" style="background-image: url({{$product->image}})"></div>
                                <label class="btn btn-primary">
                                    Upload<input type="file" class="uploadFile img" accept="image/*"
                                                 style="width: 0px;height: 0px;overflow: hidden;">
                                    <input type="hidden" class="upfile" name="image"
                                           value="{{$product->getOriginal('image')}}">
                                </label>
                            </div><!-- col-2 -->

                        </div><!-- row -->
                        <div class="row">
                            @php
                                $listsubImages = old('sub_image',$product->images->all());
                            @endphp
                            @if(!empty($listsubImages))
                                @foreach($listsubImages as $key=>$subImage)
                                    <div class="col-sm-2 imgUp">
                                        <div class="imagePreview"
                                             style="background-image: url({{$subImage->image}})"></div>
                                        <label class="btn btn-primary">Upload<input type="file" class="uploadFile img"
                                                                                    value="Upload Photo"
                                                                                    style="width:0px;height:0px;overflow:hidden;"><input
                                                    type="hidden" class="upfile" name="sub_image[]"
                                                    value="{{$subImage->getOriginal('image')}}"></label><i
                                                class="fa fa-times del"></i></div>
                                @endforeach
                            @endif
                            <i class="fa fa-plus imgAdd"></i>
                        </div>
                    </div><!-- container -->
                </div>


                <div class="form-group">
                    <label for="">Giá nhập</label>
                    <input type="number" class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" name="cost"
                           placeholder="" value="{{$product->cost}}" min="0">
                    @if($errors->has('cost'))
                        <span class="error invalid-feedback">{{$errors->first('cost')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Giá bán</label>
                    <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                           name="price"
                           placeholder="" value="{{$product->price}}" min="0">
                    @if($errors->has('price'))
                        <span class="error invalid-feedback">{{$errors->first('price')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Giá khuyến mãi</label>
                    <div class="col-sm-10">
                        @if (old('price_promotion') || $product->promotionPrice)
                            <div class="price_promotion">
                                <div class="input-group">
                                    <input type="number" style="width: 100px;" id="price_promotion"
                                           name="price_promotion"
                                           value="{!! old('price_promotion',$product->promotionPrice->price_promotion) !!}"
                                           class="form-control input-sm price_promotion" placeholder=""/>
                                    <span title="Remove" class="btn btn-flat btn-sm btn-danger removePromotion"><i
                                                class="fa fa-times"></i></span>
                                </div>

                                <div class="form-inline">
                                    <div class="input-group">
                                        Ngày bắt đầu<br>
                                        <div class="input-group">
                                            <input type="text" style="width: 150px;" id="price_promotion_start"
                                                   name="price_promotion_start"
                                                   value="{!!old('price_promotion_start',$product->promotionPrice->date_start)!!}"
                                                   class="form-control input-sm price_promotion_start date_time"
                                                   placeholder=""/>
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        Ngày kết thúc<br>
                                        <div class="input-group">
                                            <input type="text" style="width: 150px;" id="price_promotion_end"
                                                   name="price_promotion_end"
                                                   value="{!!old('price_promotion_end',$product->promotionPrice->date_end)!!}"
                                                   class="form-control input-sm price_promotion_end date_time"
                                                   placeholder=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" style="display: none;" id="add_product_promotion"
                                    class="btn btn-flat btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Thêm giá khuyến mãi
                            </button>
                        @else
                            <button type="button" class="btn btn-flat btn-success" id="add_product_promotion">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Thêm giá khuyến mãi
                            </button>
                        @endif
                    </div>
                    @if($errors->has('price'))
                        <span class="error invalid-feedback">{{$errors->first('price')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Số lượng</label>
                    <div class="input-group">
                        <input type="number"
                               class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}"
                               name="stock"
                               placeholder=""
                               value="{{$product->stock}}"
                               min="0">
                    </div>
                    @if($errors->has('stock'))
                        <span class="error invalid-feedback">{{$errors->first('stock')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Loại</label>
                    @php
                        $types = [
                            '0'=>'Normal',
                            '1'=>'New',
                            '2'=>'Hot'
                        ];
                    @endphp
                    @foreach ( $types as $key => $type)
                        <label class="radio-inline">
                            <input type="radio" name="type" value="{!! $key !!}"
                                   class="{{ $errors->has('type') ? 'is-invalid' : '' }}"
                                    {{ (old('type',$product->type) == $key)?'checked':'' }}>{{ $type }}</label>
                    @endforeach
                    @if($errors->has('type'))
                        <span class="error invalid-feedback">{{$errors->first('type')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Ngày mở bán</label>
                    <div class="input-group">
                        <input type="text"
                               style="width: 200px;"
                               id="date_available"
                               name="date_available"
                               value="{{$product->date_available}}"
                               class="form-control input-sm date_available date_time"
                               placeholder=""/>

                    </div>
                    @if($errors->has('date_available'))
                        <span class="error invalid-feedback">{{$errors->first('date_available')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Độ ưu tiên hiển thị</label>
                    <input type="number" class="form-control {{ $errors->has('sort') ? 'is-invalid' : '' }}"
                           name="sort"
                           placeholder="" value="{{$product->sort}}" min="0">
                    @if($errors->has('sort'))
                        <span class="error invalid-feedback">{{$errors->first('sort')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label>Trạng thái</label>
                        @php
                            $isChecked = ($product->status) ? 'checked' : null;
                        @endphp
                        <input name="status" type="checkbox" {{$isChecked}} data-toggle="toggle"
                               data-onstyle="outline-success"
                               data-offstyle="outline-danger">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label>Đặc sắc</label>
                        @php
                            $isChecked = ($product->featured) ? 'checked' : null;
                        @endphp
                        <input name="featured" type="checkbox" {{$isChecked}} data-toggle="toggle"
                               data-onstyle="outline-success"
                               data-offstyle="outline-danger">
                    </div>
                </div>
                <hr>
                @if (!empty($attributeGroups))
                    <div class="row">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <label>Thuộc tính</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-9">
                            @php
                                $dataAttributes = [];
                                if(old('attribute')){
                                    $dataAttributes = old('attribute');
                                }else{
                                    $currentDataAttributes = $product->attributes->groupBy('attribute_group_id')->toArray();
                                    if(count($currentDataAttributes)){
                                        foreach ($currentDataAttributes as $groupKey => $row) {
                                            $dataAttributes[$groupKey] = array_column($row, 'value');
                                        }
                                    }
                                }
                            @endphp

                            @foreach ($attributeGroups as $attGroupId => $attName)
                                <table width="100%">
                                    <tr>
                                        <td colspan="2"><b>{{ $attName }}:</b><br></td>
                                    </tr>
                                    @if (!empty($dataAttributes[$attGroupId]))
                                        @foreach ($dataAttributes[$attGroupId] as $attValue)
                                            @if ($attValue)
                                                @php
                                                    $newHtml = str_replace('attribute_group', $attGroupId, $htmlProductAtrribute);
                                                    $newHtml = str_replace('attribute_value', $attValue, $newHtml);
                                                @endphp
                                                {!! $newHtml !!}
                                            @endif
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td colspan="2"><br>
                                            <button type="button"
                                                    class="btn btn-flat btn-success add-attribute"
                                                    data-id="{{ $attGroupId }}">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Thêm thuộc tính
                                            </button>
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="{{asset('admin/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('admin/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        $('.select2').select2({
            theme: "classic",
        });
        var option = {
            showClear: true,
            format: 'Y-MM-DD HH:mm:ss'
        };
        $('.date_time').datetimepicker(option);

        tinymce.init({

            editor_selector: "mceEditor",

            selector: '#mytextarea',

            plugins: [

                'advlist autolink lists link image charmap print preview hr anchor pagebreak',

                'searchreplace wordcount visualblocks visualchars code fullscreen',

                'insertdatetime media nonbreaking save table contextmenu directionality',

                'emoticons template paste textcolor colorpicker textpattern imagetools'

            ],

            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | responsivefilemanager',

            toolbar2: 'print preview media | forecolor backcolor emoticons',

            image_advtab: true,

            templates: [

                {title: 'Test template 1', content: 'Test 1'},

                {title: 'Test template 2', content: 'Test 2'}

            ],
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title: file.name});
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            }

        });


        $(".imgAdd").click(function () {
            $(this).closest(".row").find('.imgAdd').before('' +
                '<div class="col-sm-2 imgUp">' +
                '<div class="imagePreview"></div>' +
                '<label class="btn btn-primary">Upload' +
                '<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;">' +
                '<input type="hidden" class="upfile" name="sub_image[]">' +
                '</label><i class="fa fa-times del"></i>' +
                '</div>');
        });
        $(document).on("click", "i.del", function () {
            $(this).parent().remove();
        });
        $(function () {
            $(document).on("change", ".uploadFile", function () {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function () { // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                        uploadFile.siblings(".upfile").val(this.result);
                    }
                }
            });
        });


        // Select product attributes
        $('.add-attribute').click(function (event) {
            var htmlProductAtrribute = '{!! $htmlProductAtrribute??'' !!}';
            var attGroup = $(this).attr("data-id");
            htmlProductAtrribute = htmlProductAtrribute.replace("attribute_group", attGroup);
            htmlProductAtrribute = htmlProductAtrribute.replace("attribute_value", "");
            $(this).closest('tr').before(htmlProductAtrribute);
            $('.removeAttribute').click(function (event) {
                $(this).closest('tr').remove();
            });
        });
        $('.removeAttribute').click(function (event) {
            $(this).closest('tr').remove();
        });
        //end select attributes

        // Promotion
        $('#add_product_promotion').click(function (event) {
            $(this).before('<div class="price_promotion"><div class="input-group"><input type="number" style="width: 100px;"  id="price_promotion" name="price_promotion" value="0" class="form-control input-sm price" placeholder="" /><span title="Remove" class="btn btn-flat btn-sm btn-danger removePromotion"><i class="fa fa-times"></i></span></div><div class="form-inline"><div class="input-group">Ngày bắt đầu<br><div class="input-group"><span class="input-group-addon"></span><input type="text" style="width: 100px;"  id="price_promotion_start" name="price_promotion_start" value="" class="form-control input-sm price_promotion_start date_time" placeholder="" /></div></div>' +
                '<div class="input-group">Ngày kết thúc<br><div class="input-group"><input type="text" style="width: 100px;"  id="price_promotion_end" name="price_promotion_end" value="" class="form-control input-sm price_promotion_end date_time" placeholder="" /></div></div></div></div>');
            $(this).hide();
            $('.removePromotion').click(function (event) {
                $(this).closest('.price_promotion').remove();
                $('#add_product_promotion').show();
            });
            $('.date_time').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            })
        });
        $('.removePromotion').click(function (event) {
            $('#add_product_promotion').show();
            $(this).closest('.price_promotion').remove();
        });
        //End promotion
    </script>
@endpush
