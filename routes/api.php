<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['guest:api']], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('login/refresh', 'Auth\LoginController@refresh');

    Route::post(
        'password/email',
        'Auth\ForgotPasswordController@sendResetLinkEmail'
    );
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

Route::post('upload', 'ApiController@upload');

Route::group(['middleware' => ['jwt']], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('me', 'Auth\LoginController@me');
    Route::put('profile', 'ProfileController@update');
    Route::apiResource('categories', 'CategoryController');
    Route::apiResource('products', 'ProductController');

    Route::get('stats', 'ApiController@stats');
    Route::post('users', 'TelegramController@usersIndex');
    Route::post('sendMessage', 'TelegramController@sendMessage');
});
