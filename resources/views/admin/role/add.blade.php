@extends('layouts.admin')
@section('title')
<title>
    Trang chủ
</title>

@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/add/add.css')}}">
<style>
    .card-header {
        background-color: aqua;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Roles', 'key' => 'Add'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data" style="width: 100%;">
                    <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input
                                type="text"
                                class="form-control"
                                name = "name"
                                placeholder="Nhập tên vai trò"
                                value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả vai trò</label>
                                <textarea
                                    class="form-control "
                                    name = "display_name"
                                    rows="4">{{old('description')}}
                                </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-primary mb-3 col-md-12">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" value="">
                                    </label>
                                    Modlule sản phẩm
                                </div>
                                <div class="row">
                                    @for($i = 1;$i<=4;$i++)
                                        <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <label>
                                                    <input type="checkbox" value="">
                                                </label>
                                                Thêm sản phẩm</h5>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
