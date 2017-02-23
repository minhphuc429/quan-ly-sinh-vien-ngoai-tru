<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'role:admin'], function () {

    Route::group(['prefix' => 'admin'], function () {

        // Sinh Viên
        Route::resource('sinhviens', 'SinhVienController');
        Route::resource('khoas', 'KhoaController');
        Route::resource('lops', 'LopController');
        Route::resource('ngoaitrus', 'NgoaiTruController');

        // User Manager
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('users', 'UserController');
    });
});