<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

Route::group(['middleware' => ['guest']], function () {

   //     register user
    Route::get('register',\Modules\Auth\Livewire\Register::class)->name('register');

    // login user
    Route::get('login',\Modules\Auth\Livewire\Login::class)->name('login');

    // forget password
    Route::get('forget_password',\Modules\Auth\Livewire\ForgetPassword::class)->name('forget-password');

       Route::get('reset-password/{token}',\Modules\Auth\Livewire\ResetPassword::class)
           ->name('password.reset');

});


Route::group(['middleware' => ['auth']], function () {

    // Email Verification
     Route::get('verify-email',\Modules\Auth\Livewire\EmailVerification::class)->name('verification.send');

    Route::get('verify-email/{id}/{hash}',[\Modules\Auth\Http\Controllers\VerifyEmailController::class,'verify'])
        ->middleware(['signed','throttle:6,1'])
        ->name('verification.verify');

    Route::get('logout',function (){
        Auth::logout();
    })->name('logout');


});



