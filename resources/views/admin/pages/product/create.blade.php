@extends('admin.layouts.master')
@section('title_page','Thêm mới sản phẩm')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH').'.product.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                           placeholder="Enter name">
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Sku - Mã hàng</label>
                    <input type="text" class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}" name="sku"
                           placeholder="Enter Sku">
                    @if($errors->has('sku'))
                        <span class="error invalid-feedback">{{$errors->first('sku')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea type="text" id="mytextarea" class="form-control" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}"
                            multiple="multiple" name="categories"
                            style="width: 100%;">
                        @foreach($categories as $key=>$category)
                            <option value="{{$key}}">{{ $category }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('categories'))
                        <span class="error invalid-feedback">{{$errors->first('categories')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <input type="file" class="form-control-file" name="image"
                           accept="image/*"
                    >
                </div>
                <div class="form-group">
                    <label for="">Giá nhập</label>
                    <input type="number" class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" name="cost"
                           placeholder="" value="0">
                    @if($errors->has('cost'))
                        <span class="error invalid-feedback">{{$errors->first('cost')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Giá bán</label>
                    <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                           name="price"
                           placeholder="" value="0">
                    @if($errors->has('price'))
                        <span class="error invalid-feedback">{{$errors->first('price')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Stock</label>
                    <div class="input-group">
                        <input type="number"
                               class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}"
                               name="stock"
                               placeholder=""
                               value="0">
                    </div>
                    @if($errors->has('stock'))
                        <span class="error invalid-feedback">{{$errors->first('stock')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Loại</label>
                    <input type="radio" class="{{ $errors->has('type') ? 'is-invalid' : '' }}"
                           name="type" value="0" checked> Normal
                    <input type="radio" class="{{ $errors->has('type') ? 'is-invalid' : '' }}"
                           name="type" value="1"> New
                    <input type="radio" class="{{ $errors->has('type') ? 'is-invalid' : '' }}"
                           name="type" value="2"> Hot
                    @if($errors->has('type'))
                        <span class="error invalid-feedback">{{$errors->first('type')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Date available</label>
                    <div class="input-group">
                        <input type="text"
                               style="width: 200px;"
                               id="date_available"
                               name="date_available"
                               value=""
                               class="form-control input-sm date_available date_time"
                               placeholder=""/>

                    </div>
                    @if($errors->has('date_available'))
                        <span class="error invalid-feedback">{{$errors->first('date_available')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Sort</label>
                    <input type="number" class="form-control {{ $errors->has('sort') ? 'is-invalid' : '' }}"
                           name="sort"
                           placeholder="" value="0" min="0">
                    @if($errors->has('sort'))
                        <span class="error invalid-feedback">{{$errors->first('sort')}}</span>
                    @endif
                </div>
                <div class="form-check">
                    <label>Trạng thái</label>
                    <input name="status" type="checkbox" checked data-toggle="toggle" data-onstyle="outline-success"
                           data-offstyle="outline-danger">
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')
    <script src="{{asset('admin/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        $('.select2').select2({
            theme: "classic",
        });
        $('.date_time').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })
        tinymce.init({

            editor_selector : "mceEditor",

            selector: '#mytextarea',

            plugins: [

                'advlist autolink lists link image charmap print preview hr anchor pagebreak',

                'searchreplace wordcount visualblocks visualchars code fullscreen',

                'insertdatetime media nonbreaking save table contextmenu directionality',

                'emoticons template paste textcolor colorpicker textpattern imagetools responsivefilemanager'

            ],

            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | responsivefilemanager',

            toolbar2: 'print preview media | forecolor backcolor emoticons',

            image_advtab: true,

            templates: [

                { title: 'Test template 1', content: 'Test 1' },

                { title: 'Test template 2', content: 'Test 2' }

            ],
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
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
    </script>
@endpush