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
    /*return view('welcome');*/
    return redirect('/login');
});

/*Auth::routes();*/

// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
/*Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);*/

// Password Reset Routes...
Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

// Change Password Routes...
Route::group(['middleware' => 'auth'], function () {
    Route::get('password/update', 'UpdatePasswordController@edit');
    Route::post('password/update', 'UpdatePasswordController@update');
});

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::group(['prefix' => 'admin'], function () {

        Route::resource('thongbaos', 'ThongBaoController');

        Route::resource('thongtins', 'ThongTinController');

        // Sinh Viên
        Route::resource('sinhviens', 'SinhVienController');
        Route::resource('khoas', 'KhoaController', ['except' => [
            'show',
        ]]);

        Route::resource('lops', 'LopController', ['except' => [
            'show',
        ]]);

        Route::resource('ngoaitrus', 'NgoaiTruController', ['except' => [
            'show',
        ]]);

        // User Manager
        Route::resource('roles', 'RoleController');

        Route::resource('permissions', 'PermissionController', ['except' => [
            'show',
        ]]);

        Route::resource('users', 'UserController');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'home'], function () {
        Route::resource('thongtins', 'ThongTinController', ['except' => [
            'index', 'create', 'store', 'destroy',
        ]]);

        Route::resource('thongbaos', 'ThongBaoController', ['except' => [
            'create', 'store', 'edit', 'update', 'destroy',
        ]]);

        Route::resource('ngoaitrus', 'NgoaiTruController', ['except' => [
            'index', 'create', 'store', 'destroy',
        ]]);
    });
});