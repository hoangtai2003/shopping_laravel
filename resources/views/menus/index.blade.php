@extends('layouts.admin')

@section('title')
<title>
    Trang chủ
</title>

@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'menus', 'key' => 'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
