<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::prefix('categories')->group(function () {
    Route::get('/index', [
        'as' => 'categories.index',
        'uses' => 'App\Http\Controllers\CategoryController@index'
     ]);
    Route::get('/create', [
       'as' => 'categories.create',
       'uses' => 'App\Http\Controllers\CategoryController@create'
    ]);
    Route::post('/store', [
        'as' => 'categories.store',
        'uses' => 'App\Http\Controllers\CategoryController@store'
     ]);
     Route::get('/edit{id}', [
        'as' => 'categories.edit',
        'uses' => 'App\Http\Controllers\CategoryController@edit'
     ]);
     Route::get('/delete{id}', [
        'as' => 'categories.delete',
        'uses' => 'App\Http\Controllers\CategoryController@delete'
     ]);
     Route::post('/update{id}', [
        'as' => 'categories.update',
        'uses' => 'App\Http\Controllers\CategoryController@update'
     ]);
});
