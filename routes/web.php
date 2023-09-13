<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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
    Route::prefix('categories')->group(function () {
        Route::get('/index', [
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index',
            'middleware' => 'can:category-list'
         ]);
        Route::get('/create', [
           'as' => 'categories.create',
           'uses' => 'App\Http\Controllers\CategoryController@create',
            'middleware' => 'can:category-add'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store',
         ]);
        Route::get('/edit{id}', [
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit',
            'middleware' => 'can:category-edit'
        ]);
        Route::get('/delete{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete',
            'middleware' => 'can:category-delete'
        ]);
        Route::post('/update{id}', [
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update'
        ]);
    });
    Route::prefix('menus')->group(function () {
        Route::get('/index', [
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenuController@index',
            'middleware' => 'can:menu-list'
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'App\Http\Controllers\MenuController@create',
            'middleware' => 'can:menu-add'
        ]);
        Route::post('/store', [
             'as' => 'menus.store',
             'uses' => 'App\Http\Controllers\MenuController@store'
        ]);
        Route::get('/edit{id}', [
            'as' => 'menus.edit',
            'uses' => 'App\Http\Controllers\MenuController@edit',
            'middleware' => 'can:menu-edit'
         ]);
        Route::get('/delete{id}', [
            'as' => 'menus.delete',
            'uses' => 'App\Http\Controllers\MenuController@delete',
            'middleware' => 'can:menu-delete'
        ]);
        Route::post('/update{id}', [
            'as' => 'menus.update',
            'uses' => 'App\Http\Controllers\MenuController@update'
        ]);
    });
    // Product
    Route::prefix('products')->group(function () {
        Route::get('/index', [
            'as' => 'products.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index',
            'middleware' => 'can:product-list'
        ]);
        Route::get('/create', [
            'as' => 'products.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create',
            'middleware' => 'can:product-add'
        ]);
        Route::post('/store', [
            'as' => 'products.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store'
        ]);
        Route::get('/edit{id}', [
            'as' => 'products.edit',
            'uses' => 'App\Http\Controllers\AdminProductController@edit',
            'middleware' => 'can:product-edit'
        ]);
        Route::post('/update{id}', [
            'as' => 'products.update',
            'uses' => 'App\Http\Controllers\AdminProductController@update'
        ]);
        Route::get('/delete{id}', [
            'as' => 'products.delete',
            'uses' => 'App\Http\Controllers\AdminProductController@delete',
            'middleware' => 'can:product-delete'
        ]);
    });

    //Slider
    Route::prefix('sliders')->group(function () {
        Route::get('/index', [
            'as' => 'sliders.index',
            'uses' => 'App\Http\Controllers\SliderAdminController@index',
            'middleware' => 'can:slider-list'
        ]);
        Route::get('/create', [
            'as' => 'sliders.create',
            'uses' => 'App\Http\Controllers\SliderAdminController@create',
            'middleware' => 'can:slider-add'
        ]);
        Route::post('/store', [
            'as' => 'sliders.store',
            'uses' => 'App\Http\Controllers\SliderAdminController@store'
        ]);
        Route::get('/edit{id}', [
            'as' => 'sliders.edit',
            'uses' => 'App\Http\Controllers\SliderAdminController@edit',
            'middleware' => 'can:slider-edit'
        ]);
        Route::post('/update{id}', [
            'as' => 'sliders.update',
            'uses' => 'App\Http\Controllers\SliderAdminController@update'
        ]);
        Route::get('/delete{id}', [
            'as' => 'sliders.delete',
            'uses' => 'App\Http\Controllers\SliderAdminController@delete',
            'middleware' => 'can:slider-delete'
        ]);
    });
    // Settings
    Route::prefix('settings')->group(function () {
        Route::get('/index', [
            'as' => 'settings.index',
            'uses' => 'App\Http\Controllers\AdminSettingController@index',
            'middleware' => 'can:setting-list'
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'App\Http\Controllers\AdminSettingController@create',
            'middleware' => 'can:setting-add'
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'App\Http\Controllers\AdminSettingController@store'
        ]);
        Route::get('/edit{id}', [
            'as' => 'settings.edit',
            'uses' => 'App\Http\Controllers\AdminSettingController@edit',
            'middleware' => 'can:setting-edit'
        ]);
        Route::post('/update{id}', [
            'as' => 'settings.update',
            'uses' => 'App\Http\Controllers\AdminSettingController@update'
        ]);
        Route::get('/delete{id}', [
            'as' => 'settings.delete',
            'uses' => 'App\Http\Controllers\AdminSettingController@delete',
            'middleware' => 'can:setting-delete'
        ]);
    });

    //Users
    Route::prefix('users')->group(function () {
        Route::get('/index', [
            'as' => 'users.index',
            'uses' => 'App\Http\Controllers\UserAdminController@index',
            'middleware' => 'can:user-list'
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'App\Http\Controllers\UserAdminController@create',
            'middleware' => 'can:user-add'
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'App\Http\Controllers\UserAdminController@store'
        ]);
        Route::get('/edit{id}', [
            'as' => 'users.edit',
            'uses' => 'App\Http\Controllers\UserAdminController@edit',
            'middleware' => 'can:user-edit'
        ]);
        Route::post('/update{id}', [
            'as' => 'users.update',
            'uses' => 'App\Http\Controllers\UserAdminController@update'
        ]);
        Route::get('/delete{id}', [
            'as' => 'users.delete',
            'uses' => 'App\Http\Controllers\UserAdminController@delete',
            'middleware' => 'can:user-delete'
        ]);
    });

    // Roles
    Route::prefix('roles')->group(function () {
        Route::get('/index', [
            'as' => 'roles.index',
            'uses' => 'App\Http\Controllers\RolesAdminController@index'
        ]);
        /* The code block you provided is defining routes for user administration. */
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'App\Http\Controllers\RolesAdminController@create'
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'App\Http\Controllers\RolesAdminController@store'
        ]);
        Route::get('/edit{id}', [
            'as' => 'roles.edit',
            'uses' => 'App\Http\Controllers\RolesAdminController@edit'
        ]);
        Route::post('/update{id}', [
            'as' => 'roles.update',
            'uses' => 'App\Http\Controllers\RolesAdminController@update'
        ]);
        Route::get('/delete{id}', [
            'as' => 'roles.delete',
            'uses' => 'App\Http\Controllers\RolesAdminController@delete'
        ]);
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'App\Http\Controllers\PermissionAdminController@create'
        ]);
        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'App\Http\Controllers\PermissionAdminController@store'
        ]);
    });
});

