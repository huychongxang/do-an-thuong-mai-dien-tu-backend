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
                    <select class="form-control select2" multiple="multiple" name="categories"
                            style="width: 100%;">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check">
                    <label>Trạng thái</label>
                    <input name="status" type="checkbox" checked data-toggle="toggle" data-onstyle="outline-success"
                           data-offstyle="outline-danger">
                </div>
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <input type="file" class="form-control-file" name="image"
                           accept="image/*"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')
    <script>
        $('.select2').select2({
            theme: "classic",
        });

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

        });
    </script>
@endpush
