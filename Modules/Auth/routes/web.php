<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

Route::group(['middleware' => ['guest']], function () {

   //     register user
    Route::get('register',\Modules\Auth\Livewire\Register::class)->name('register');

    // login user
    Route::get('login',\Modules\Auth\Livewire\Login::class)->name('login');


    // forget password
    Route::get('forget_password',\Modules\Auth\Livewire\ForgetPassword::class)->name('forget-password');
});
