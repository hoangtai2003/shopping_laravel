<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\RolesAdminController;
use App\Http\Controllers\PermissionAdminController;
use App\Http\Controllers\CategoryClientController;


Route::get('/admin', function () {
    return view('admin.HomeAdmin');
});
Route::get('/login', [AdminController::class, "loginAdmin"]);
Route::post('/login', [AdminController::class, "postLoginAdmin"]);
Route::get('/', 'App\Http\Controllers\HomeClientController@index')->name('home');
Route::get('/category/{slug}/{id}', [CategoryClientController::class, "index"])->name('category.product');
Route::get('/home',[HomeClientController::class,"index"]);
Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class)->shallow();
    Route::resource('settings', AdminSettingController::class)->shallow();
    Route::resource('menus', AdminMenuController::class)->shallow();
    Route::resource('products', AdminProductController::class)->shallow();
    Route::resource('sliders', AdminSliderController::class)->shallow();
    Route::resource('users', UserAdminController::class)->shallow();
    Route::resource('roles', RolesAdminController::class)->shallow();
    Route::resource('permissions', PermissionAdminController::class)->only([
        'create', 'store'
    ]);
});

