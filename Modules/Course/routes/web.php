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


Route::group(['middleware' => ['auth','admin'],'prefix' => 'panel'], function () {
    Route::get('courses', \Modules\Course\Livewire\Courses::class)->name('panel.courses');
    Route::get('teacher_courses', \Modules\Course\Livewire\TeacherCourses::class)->name('panel.teacher_courses');
    Route::get('add_courses', \Modules\Course\Livewire\AddCourse::class)->name('panel.add_course');
    Route::get('courses_details/{course_id}', \Modules\Course\Livewire\CourseDetail::class)->name('panel.course_details');
});
