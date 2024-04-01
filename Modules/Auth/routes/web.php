<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

Route::group([], function () {
    Route::get('login',\Modules\Auth\Livewire\Login::class)->name('login');
    Route::get('register',\Modules\Auth\Livewire\Register::class)->name('register');
    Route::get('forget_password',\Modules\Auth\Livewire\ForgetPassword::class)->name('forget-password');
});
