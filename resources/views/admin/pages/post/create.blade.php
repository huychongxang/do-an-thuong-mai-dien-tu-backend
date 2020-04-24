@extends('admin.layouts.master')
@section('title_page','Thêm mới bài viết')
@push('styles')
    <link rel="stylesheet"
          href="{{asset('admin/Date-Time-Picker-Bootstrap-4/build/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('admin/tageditor/jquery.tag-editor.css')}}">
    <style>
        form {
            width: 100%;
            display: flex;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <form method="post" action="{{route(env('ADMIN_PATH','cms').'.order-status.store')}}"
              id="post-form"
              enctype="multipart/form-data"
        >
            @csrf
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="">Giới thiệu ngắn</label>
                            <textarea name="excerpt" class="form-control" cols="50" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="body" class="form-control" cols="50" rows="10"></textarea>
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
                            <input class="form-control" name="published_at" type="text" id="published_at">
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
                                    <option value="{{$id}}">{{$name}}</option>
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
                        <div class="form-group">

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Tags</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" name="post_tags" type="text">
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
    <script src="{{asset('admin/tageditor/jquery.caret.min.js')}}"></script>
    <script src="{{asset('admin/tageditor/jquery.tag-editor.min.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            var tagOptions = {};
            tagOptions.autocomplete = {
                delay: 0, // show suggestions immediately
                position: {collision: 'flip'}, // automatic menu position up/down
                source: '{{route(env('ADMIN_PATH','cms').'.tags.list')}}'
            };
            $('input[name=post_tags]').tagEditor(tagOptions);
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
        });
    </script>
@endpush
