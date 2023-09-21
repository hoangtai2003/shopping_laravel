<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\RolesAdminController;


Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');
Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin');
Route::get('/admin', function () {
    return view('admin.HomeAdmin');
});
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/category/{slug}/{id}', [
    'as'=>'category.product',
    'uses'=>'App\Http\Controllers\CategoryController@index'
]);
Route::get('/home',[HomeController::class,"index"]);
Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class)->shallow();
    Route::resource('settings', AdminSettingController::class)->shallow();
    Route::resource('menus', AdminMenuController::class)->shallow();
    Route::resource('products', AdminProductController::class)->shallow();
    Route::resource('sliders', AdminSliderController::class)->shallow();
    Route::resource('users', UserAdminController::class)->shallow();
    Route::resource('roles', RolesAdminController::class)->shallow();
    Route::resource('permissions', 'PermissionAdminController')->only([
        'create', 'store'
    ]);
});

