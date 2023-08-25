<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use Illuminate\Http\Request;

class SliderAdminController extends Controller
{
    public function index(){
        return view('admin.slider.index');
    }
    public function create(){
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request){

    }
}
