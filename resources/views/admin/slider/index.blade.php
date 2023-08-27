@extends('layouts.admin')

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
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <a href="{{route('sliders.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Slider</th>
                                <th scope="col">Description</th>
                                <th scope="col">Hình ảnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <th scope="row">{{$slider->id}}</th>
                                    <td>{{$slider->name}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td>
                                        <img class="image_slider" src = "{{$slider->image_path}}">
                                    </td>
                                    <td>
                                        <a href="{{route('sliders.edit', ['id' => $slider->id])}}" class="btn btn-default">Edit</a>
                                        <a href=""
                                            data-url = "{{route('sliders.delete', ['id' => $slider->id])}}"
                                            class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
