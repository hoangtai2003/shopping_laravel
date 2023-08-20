<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\AdminController@loginAdmin', function () {
    return view('welcome');
});
Route::post('/', 'App\Http\Controllers\AdminController@postLoginAdmin', function () {
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
Route::prefix('menus')->group(function () {
    Route::get('/index', [
        'as' => 'menus.index',
        'uses' => 'App\Http\Controllers\MenuController@index'
    ]);
    Route::get('/create', [
        'as' => 'menus.create',
        'uses' => 'App\Http\Controllers\MenuController@create'
    ]);
    Route::post('/store', [
         'as' => 'menus.store',
         'uses' => 'App\Http\Controllers\MenuController@store'
    ]);
    Route::get('/edit{id}', [
        'as' => 'menus.edit',
        'uses' => 'App\Http\Controllers\MenuController@edit'
     ]);
    Route::get('/delete{id}', [
        'as' => 'menus.delete',
        'uses' => 'App\Http\Controllers\MenuController@delete'
    ]);
    Route::post('/update{id}', [
        'as' => 'menus.update',
        'uses' => 'App\Http\Controllers\MenuController@update'
    ]);
});
