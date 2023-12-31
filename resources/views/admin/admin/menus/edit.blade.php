@extends('admin.layouts.admin')

@section('title')
<title>
    Trang chủ
</title>

@endsection

@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'menus', 'key' => 'edit'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('menus.update', ['menu' => $menuFollowIdEdit->id]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input
                                type="text"
                                class="form-control"
                                name = "name"
                                value="{{ $menuFollowIdEdit->name }}"
                                placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn danh mục cha</option>
                                {!! $optionSelect !!}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
