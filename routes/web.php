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

Route::get('/home', 'HomeController@index');

/*Route::group(['middleware' => 'role:admin'], function () {*/

    Route::group(['prefix' => 'admin'], function () {

        // Sinh Viên
        Route::resource('sinhviens', 'SinhVienController');
        Route::resource('khoas', 'KhoaController');
        Route::resource('lops', 'LopController');
        Route::resource('ngoaitrus', 'NgoaiTruController');

        // User Manager
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController', ['except' => [
            'show'
        ]]);
        Route::resource('users', 'UserController');
    });
/*});*/

Route::group(['prefix' => 'home'], function () {
    Route::resource('thongtins', 'ThongTinController');
});