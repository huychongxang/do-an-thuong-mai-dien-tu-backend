@extends('admin.layouts.master')
@section('title_page','Danh sách Product Category')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('cms-api.product-category.list') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'description', name: 'description'},
                    {data: 'parent_name', name: 'parent_name'},
                    {data: 'status', name: 'status'},
                    {data: 'image', name: 'image'},
                    {data: 'action', name: 'action', sortable: false},
                ]
            });
        });
    </script>
@endpush
