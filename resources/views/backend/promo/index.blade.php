@extends('layouts.backend.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Khuyến mãi</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Khuyến mãi</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách khuyến mãi</h4>
                <div class="table-responsive">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" placeholder="Tìm kiếm khuyến mãi" autofocus>
                    </div>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Mã huyến mãi</th>
                                <th>Giá trị khuyến mãi</th>
                                <th>Mô tả khuyến mãi</th>
                                <th class="text-nowrap"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promos as $promo)
                            <tr>
                                <td>{{ $promo->code }}</td>
                                <td>{{ $promo->discount }}</td>
                                <td>{{ $promo->description }}</td>
                                <td>
                                    <a href="{{ route('promos.edit', ['promo' => $promo->id ]) }}"
                                        data-toggle="tooltip" data-original-title="Cập nhật">
                                        <i class="fa fa-pencil text-inverse m-r-10"></i>
                                    </a>
                                    <form action="{{ route('promos.destroy', ['promo' => $promo->id ]) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn-none" type="submit" data-toggle="tooltip" data-original-title="Xoá">
                                            <i class="fa fa-close text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $promos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
