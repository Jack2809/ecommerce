@extends('layouts.backend.app')
@section('script')
    <script src="{{ asset('backend/js/send_email.js') }}"></script>
@endsection
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Liên hệ email</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Liên hệ email</li>
                </ol>
            </div>
        </div>
    </div>
    <form action="{{ route('send-email.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card card-body">
                    <h3 class="box-title m-b-0 mb-3">Gửi mail</h3>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Tiêu đề *</label>
                                <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="title"
                                    value="{{ old('title') }}" autocomplete="off" required>
                                @error('title')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="custom-file mb-4">
                                <input type="file" class="custom-file-input" id="customFile" name="file_upload[]" multiple>
                                <label class="custom-file-label" for="customFile">Chọn tệp</label>
                            </div>

                            <textarea id="summernote" name="body">{{ old('body') }}</textarea>
                            @error('body')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#group" role="tab">Nhóm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#individual" role="tab">Cá nhân</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="group" role="tabpanel">
                            <div class="card-body">
                                <div>
                                    <label>Gửi tin nhắn đến </label><br>
                                    @foreach ($roles as $role)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}">
                                            <label class="custom-control-label"
                                                for="role_{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach

                                    @if ($customers->count() > 0)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customer_role"
                                                name="customer_role" value="true">
                                            <label class="custom-control-label" for="customer_role">Khách hàng</label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="individual" role="tabpanel">
                            <div class="card-body" id="individual_wrapper">
                                <div>
                                    <div class="mb-3">
                                        <label>Gửi tin nhắn đến </label>
                                        <button class="icon-btn plus-btn" type="button"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-body">
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg waves-effect waves-light m-r-10 mt-3">Gửi</button>
            </div>
        </div>
    </form>

@endsection
