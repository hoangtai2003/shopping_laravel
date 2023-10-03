@extends('admin.layouts.admin')

@section('title')
<title>
    Settings
</title>

@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/setting/index/index.css')}}">

@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admins/main.js')}}"></script>

@endsection

@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'settings', 'key' => 'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="btn-group float-right mt-10">
                        <a  class="btn btn-danger dropdown-toggle" data-toggle = "dropdown">
                          Add setting
                        </a>
                        <ul class="dropdown-menu " >
                            <li><a href="{{route('settings.create'). '?type=Text'}}">Text</a></li>
                            <li><a href="{{route('settings.create'). '?type=Textarea'}}">Textarea</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <form method="POST">
                        @method('delete')
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <th scope="row">{{$setting->id}}</th>
                                    <td>{{$setting->config_key}}</td>
                                    <td>{{$setting->config_value}}</td>
                                    <td>
                                        <a
                                            href="{{route('settings.edit', ['setting'=>$setting->id]) . '?type= '. $setting->type}}"
                                            class="btn btn-default">Edit</a>
                                        <a
                                            href="{{route('settings.destroy', ['setting'=>$setting->id])}}"
                                            class="btn btn-danger action_delete"
                                        >Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>


                </div>

                <div class="col-md-12">
                    {{ $settings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
