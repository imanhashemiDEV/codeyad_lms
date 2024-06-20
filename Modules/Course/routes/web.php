<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\CourseController;

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


Route::group(['middleware' => ['auth'],'prefix' => 'panel'], function () {
    Route::get('courses', \Modules\Course\Livewire\Courses::class)->name('panel.courses');
    Route::get('teacher_courses', \Modules\Course\Livewire\TeacherCourses::class)->name('panel.teacher_courses');
});
