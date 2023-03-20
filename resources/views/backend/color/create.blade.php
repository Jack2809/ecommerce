@extends('layouts.backend.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Màu sắc</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Màu sắc</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h3 class="box-title m-b-0 mb-3">Tạo màu sắc</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{ route('colors.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Màu sắc</label>
                            <input type="text" class="form-control" placeholder="Nhập tên màu sắc"
                            name="name" value="{{ old('name') }}" autocomplete="off">
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Chọn màu sắc</label>
                            <input type="color" class="form-control" placeholder="Nhập tên màu sắc"
                            name="code" value="{{ old('code') }}" autocomplete="off">
                            @error('code')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Tạo màu sắc</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
