@extends('admin.layouts.master')
@section('title_page','Sửa bài viết')
@push('styles')
    <link rel="stylesheet"
          href="{{asset('admin/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('admin/css/upload-image.css')}}">
    <style>
        form {
            width: 100%;
            display: flex;
        }

        .imagePreview {
            height: 250px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <form method="post" action="{{route(env('ADMIN_PATH','cms').'.posts.update',$post->id)}}"
              id="post-form"
              enctype="multipart/form-data"
        >
            @csrf
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                   name="title" value="{{$post->title}}">
                            @if($errors->has('title'))
                                <span class="error invalid-feedback">{{$errors->first('title')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Giới thiệu ngắn</label>
                            <textarea name="excerpt"
                                      class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" cols="50"
                                      rows="10">{{$post->excerpt}}</textarea>
                            @if($errors->has('excerpt'))
                                <span class="error invalid-feedback">{{$errors->first('excerpt')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea id="mytextarea" name="body"
                                      class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" cols="50"
                                      rows="100">{!! $post->body !!}</textarea>
                            @if($errors->has('body'))
                                <span class="error invalid-feedback">{{$errors->first('body')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Publish</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Ngày publish</label>
                            <input value="{{$post->published_at}}"
                                   class="form-control {{ $errors->has('published_at') ? 'is-invalid' : '' }}"
                                   name="published_at" type="text"
                                   id="published_at">
                            @if($errors->has('published_at'))
                                <span class="error invalid-feedback">{{$errors->first('published_at')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <a id="draft-btn" href="" class="btn btn-primary">Lưu tạm</a>
                        </div>
                        <div class="float-right">
                            <input class="btn btn-success" type="submit" value="Publish">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                @foreach($categories as $id=>$name)
                                    @php
                                        $isChecked = ($id == $post->category_id) ? 'selected' : null;
                                    @endphp
                                    <option {{$isChecked}} value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Ảnh đại diện</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="form-group imgUp">
                            <div class="imagePreview" style="background-image: url({{$post->image}})"></div>
                            <label class="btn btn-primary">
                                Upload<input type="file"
                                             class="uploadFile img {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                             accept="image/*"
                                             style="width: 0px;height: 0px;overflow: hidden;">
                                @if($errors->has('image'))
                                    <span class="error invalid-feedback">{{$errors->first('image')}}</span>
                                @endif
                                <input type="hidden" class="upfile" name="image"
                                       value="{{$post->getOriginal('image')}}">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="{{asset('admin/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('admin/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            var option = {
                showClear: true,
                defaultDate: new Date(),
                format: 'Y-MM-DD HH:mm:ss'
            };
            $('#published_at').datetimepicker(option);
            $('#draft-btn').click(function (event) {
                event.preventDefault();
                $('#published_at').val("");
                $('#post-form').submit();
            });


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
    </script>
@endpush
