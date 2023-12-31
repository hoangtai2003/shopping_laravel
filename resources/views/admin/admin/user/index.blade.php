@extends('admin.layouts.admin')

@section('title')
<title>
    Trang chủ
</title>

@endsection


@section('css')

<link rel="stylesheet" href="{{asset('admins/slider/index/index.css')}}">
@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection


@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'User', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{route('users.edit', ['user' => $user->id])}}" class="btn btn-default">Edit</a>
                                        <a href=""
                                            data-url = "{{route('users.show', ['user' => $user->id])}}"
                                            class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
