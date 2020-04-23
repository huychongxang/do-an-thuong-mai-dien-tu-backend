@extends('admin.layouts.master')
@section('title_page','Thêm mới trạng thái đơn hàng')
@push('styles')

@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route(env('ADMIN_PATH','cms').'.order-status.store')}}">
                @csrf
                <div class="form-group">
                    <label for="">Mã</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name">
                    @if($errors->has('name'))
                        <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}"
                           name="label">
                    @if($errors->has('label'))
                        <span class="error invalid-feedback">{{$errors->first('label')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Type</label>
                    @php
                        $types = [
                            'primary','secondary','success','danger','warning','info','dark'
                        ];
                    @endphp
                    @foreach($types as $key=>$type)
                        <input {{($key ==0) ? 'checked': null}} type="radio"
                               class="{{ $errors->has('type') ? 'is-invalid' : '' }}" value="{{$type}}"
                               name="type"><span class="badge bg-{{$type}}"
                                                 style="width: 20px;height: 20px;display: inline-block"></span>
                    @endforeach

                    @if($errors->has('type'))
                        <span class="error invalid-feedback">{{$errors->first('type')}}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
@push('scripts')

@endpush
