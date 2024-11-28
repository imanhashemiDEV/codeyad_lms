<?php

use Illuminate\Support\Facades\Route;
use Modules\CourseDetailsPage\Http\Controllers\CourseDetailsPageController;
use Modules\CourseDetailsPage\Livewire\CourseDetails;

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
    Route::get('/course_details/{course}', CourseDetails::class)->name('course.details');
});
