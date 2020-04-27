@extends('admin.layouts.master')
@section('title_page','Danh sách bài viết')
@push('styles')

@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="float-left">
                <a class="btn btn-success" href="{{route(env('ADMIN_PATH','cms').'.posts.create')}}">Thêm
                    mới</a>
            </div>

            <div class="float-right" style="padding:7px 0">
                <?php $list = []; ?>
                @foreach($statusList as $key=>$value)
                    @if($value)
                        <?php $selected = Request::get('status') == $key ? 'selected-status' : ''  ?>
                        <?php $list[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})" . "</a>"  ?>
                    @endif
                @endforeach
                {!! implode(' | ',$list) !!}
            </div>
        </div>


    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive no-padding">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tiêu đề</th>
                        <th>Tác giả</th>
                        <th>Danh mục</th>
                        <th>Ngày</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    {{$posts->links()}}
                    <tbody>
                    @foreach($posts as $key=>$post)
                        @php
                            $editUrl = route(env('ADMIN_PATH','cms') . '.posts.edit', $post->id);
                            $deleteUrl = route(env('ADMIN_PATH','cms') . '.posts.destroy', $post->id);
                        @endphp
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->author->name}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <a href="{{$editUrl}}" class="badge bg-primary"><i class="fa fa-pen"></i>
                                    Sửa</a>
                                <form action='{{$deleteUrl}}' method='post'>
                                    @csrf
                                    @method('DELETE')
                                    <a class='badge bg-danger delete-confirm'><i
                                                class="fa fa-times"></i> Xóa
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <small>Showing {{$posts->firstItem()}} to {{$posts->lastItem()}}
                        of {{$posts->total()}} {{Str::plural('new',$posts->total())}}</small>
                    {{$posts->appends(request()->input())->links()}}

                </div>
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
