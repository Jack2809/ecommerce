@extends('layouts.backend.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Blogs</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Blogs</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h3 class="box-title m-b-0 mb-3">Tạo Blog</h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên Blog</label>
                            <input type="text" class="form-control" placeholder="Nhập tên blog..." name="title" value="{{ old('title') }}" autocomplete="off">
                            @error('title')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <h5 class="m-t-30">Chọn thẻ</h5>
                            @foreach ($tags as $tag)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="tag{{ $tag->id }}"
                                    value="{{ $tag->id }}" name="tags[]" @if(in_array($tag->id, old('tags', []))) checked @endif>
                                    <label class="custom-control-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                </div>
                            @endforeach
                            @error('tags')
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
                            @if ($errors->any())
                                <div class="error">Chọn lại hình ảnh</div>
                            @endif
                        </div>
                        <textarea id="summernote" name="body">{{ old('body') }}</textarea>
                        @error('body')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 mt-3">Tạo Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
