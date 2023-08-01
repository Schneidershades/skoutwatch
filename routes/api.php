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

        Route::post('/email/resend-verify-Otp-with-link', 'VerificationController@resendverifyotpwithlink')->name('verification.verifywithlink');
        Route::post('/document/verify', 'DocumentVerificationController@store')->name('verification.document');
        Route::post('/document/resend/otp', 'DocumentResendOtpController@store')->name('verification.resend.otp');
        Route::post('/ScheduleSession/verify', 'SessionScheduleVerificationController@store')->name('verification.session');
        Route::post('/session/resend/otp', 'SessionScheduleResendOtpController@store')->name('session.verification.resend.otp');
    });
});
