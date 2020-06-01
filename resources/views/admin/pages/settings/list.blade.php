@extends('admin.layouts.master')
@section('title_page','Danh sách setting')
@push('styles')

@endpush
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive no-padding">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Key</th>
                        <th>Giá trị</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settings as $key=>$setting)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.settings.edit', $setting->id);
                        @endphp
                        <tr>
                            <td>{{$setting->id}}</td>
                            <td>{{$setting->key}}</td>
                            <td>{{$setting->value}}</td>
                            <td>
                                @if(auth()->user()->can(\App\Models\ACL::PERMISSION_EDIT_SETTING))
                                    <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                        Sửa</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')
    <script>
        $(function () {
            $('body').on('click', '.delete-confirm', function (e) {
                event.preventDefault();
                Swal.fire({
                    title: 'Bạn chắc chắn muốn xóa chứ',
                    text: "Không thể khôi phục lại được",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Thoát',
                    confirmButtonText: 'Đúng, tôi muốn xóa'
                }).then((result) => {
                    if (result.value) {
                        this.closest('form').submit()
                    }
                })
            });
        });
    </script>
@endpush
