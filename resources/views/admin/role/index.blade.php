@extends('layouts.admin')

@section('title')
<title>
    Trang chủ
</title>

@endsection



@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection


@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Roles', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên vai trò </th>
                                <th scope="col">Mô tả vai trò</th>
                                <th scope="col">Hình ảnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->display_name}}</td>
                                    <td>
                                        <a href="{{route('roles.edit', ['id' =>$role->id])}}" class="btn btn-default">Edit</a>
                                        <a href=""
                                            data-url = "{{route('roles.delete', ['id' =>$role->id])}}"
                                            class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
