<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::group(['prefix' => 'user', 'namespace' => 'Api\Auth'], function () {
        Route::post('register', 'UserController@register');
        Route::post('login', 'UserController@login');
        Route::post('logout', 'UserController@logout');
        Route::post('/password/email', 'ForgotPasswordController@forgotPassword');
        Route::post('/password/reset', 'ResetPasswordController@reset');
        Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
        Route::post('/email/verify', 'VerificationController@verify')->name('verification.verify');
    });


    Route::resource('/solana-wallet', 'Api\Solana\SolanaKeyController');

    Route::group(['prefix' => 'user', 'middleware' => 'auth:sanctum', 'namespace' => 'Api\Auth'], function () {
        Route::post('update', 'UserController@updateUser');
        Route::get('profile', 'UserController@profile');
        Route::get('dashboard', 'UserController@dashboard');
        Route::post('change/password', 'ChangePasswordController@store');
    });

    Route::group(['middleware' => 'auth:sanctum', 'namespace' => 'Api\Attribute'], function () {
        Route::resource('attributes', 'AttributeController');
        Route::resource('attribute-category', 'AttributeCategoryController');
    });
});
