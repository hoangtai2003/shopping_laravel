@extends('layouts.admin')
@section('title')
<title>
    Trang chủ
</title>

@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input
                                type="text"
                                class="form-control"
                                name = "name"
                                placeholder="Nhập tên">
                        </div>
                        <div class="form-group">
                            <label>Mô tả slider</label>
                            <input
                                type="text"
                                class="form-control"
                                name = "description"
                                placeholder="Nhập mô tả">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input
                                type="file"
                                class="form-control-file"
                                name = "image_path">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
