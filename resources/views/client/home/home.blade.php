@php
    use Illuminate\Database\Eloquent\Collection;
        /**
         * @var array|Collection $sliders
         */
@endphp
@extends('client.layouts.master')
@section('title')
    <title>Home page</title>
@endsection

@section('css')
    <link href="{{asset("client/home/home.css")}}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{asset('client/home/home.js')}}"></script>
@endsection

@section('content')
    {{-- Slider --}}
    @include('client.home.component.slider',['sliders'=>$sliders])
    <section>
        <div class="container">
            <div class="row">
                @include('client.components.sidebar')

                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('client.home.component.feature_product')
                    <!--features_items-->

                    <!--category-tab-->

                    <!--/category-tab-->
                    @include('client.home.component.category_tag')

                    <!--recommended_items-->
                    @include('client.home.component.recomment_product')
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>


@endsection
