@extends('layouts.backend.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Loại sản phẩm</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Loại sản phẩm</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h3 class="box-title m-b-0 mb-3">Tạo loại sản phẩm</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên loại sản phẩm</label>
                            <input type="text" class="form-control" placeholder="Nhập tên loại sản phẩm" name="name" value="{{ old('name') }}" autocomplete="off">
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image_path') is-invalid @enderror" name="image_path" accept="image/*">
                                    <label class="custom-file-label">Chọn hình ảnh</label>
                                </div>
                            </div>
                            @error('image_path')
                                <div class="error">{{ $message }}</div>
                            @enderror
                            @if ($errors->any())
                                <div class="error">Hãy chọn lại hình ảnh</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Tạo loại sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
