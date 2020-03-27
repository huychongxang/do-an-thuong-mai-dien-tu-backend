@extends('admin.layouts.master')
@section('title_page','Create Product Category')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH').'.product-categories.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Parent</label>
                    <select class="form-control" name="parent_id">
                        @foreach($parentCategories as $id=>$name)
                            <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check">
                    <label>Status</label>
                    <input name="status" type="checkbox" checked data-toggle="toggle" data-onstyle="outline-success"
                           data-offstyle="outline-danger">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control-file" name="image"
                           accept="image/*"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

@endpush
