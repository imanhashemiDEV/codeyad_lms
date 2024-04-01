<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

Route::group([], function () {
    Route::get('login',\Modules\Auth\Livewire\Login::class)->name('login');
});
