<?php

use Illuminate\Support\Facades\Route;
use Modules\Student\Http\Controllers\StudentController;
use Modules\Student\Livewire\StudentDashboard;
use Modules\Student\Livewire\StudentProfile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::get('/student_dashboard', StudentDashboard::class)->name('student.dashboard');
    Route::get('/student_profile', StudentProfile::class)->name('student.profile');
});

