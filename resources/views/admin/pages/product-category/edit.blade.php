@extends('admin.layouts.master')
@section('title_page','Sửa danh mục sản phẩm')
@push('styles')
    <link rel="stylesheet" href="{{asset('admin/css/upload-image.css')}}">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.product-categories.update',$productCategory->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                           value="{{$productCategory->name}}"
                           placeholder="Enter name">
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea type="text" class="form-control"
                              name="description">{{$productCategory->description}}</textarea>
                </div>
                <div class="form-check">
                    <label>Trạng thái</label>
                    <?php
                    $idOn = $productCategory->status == 1 ? 'checked' : '';
                    ?>
                    <input name="status" type="checkbox" {{$idOn}} data-toggle="toggle" data-onstyle="outline-success"
                           data-offstyle="outline-danger">
                </div>
                <div class="form-group up-anh">
                    <label for="">Ảnh</label>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2 imgUp">
                                <div class="imagePreview" style="background-image: url({{$productCategory->image}})"></div>
                                <label class="btn btn-primary">
                                    Upload<input type="file" class="uploadFile img" accept="image/*"
                                                 style="width: 0px;height: 0px;overflow: hidden;">
                                    <input type="hidden" class="upfile" name="image"
                                           value="{{$productCategory->getOriginal('image')}}">
                                </label>
                            </div><!-- col-2 -->

                        </div><!-- row -->
                    </div><!-- container -->
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')
    <script>
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
    </script>
@endpush
