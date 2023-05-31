<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Instructor\AnnouncementController;
use App\Http\Controllers\Instructor\FolderController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\FolderController as StudentFolderController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'handleLogin'])->name('handle.login');
Route::get('logout', [AuthController::class, 'handleLogout'])->middleware('auth')->name('handle.logout');


Route::prefix('student')->middleware(['auth', 'is_student'])->group(function () {
    Route::view('index', 'student.index')->middleware('get_all_requirements_stu')->name('student.index');

    //Routes about courses
    Route::get('courses/{course}', [CourseController::class, 'index'])->name('student.course.index');
    Route::get('courses/{course}/details', [CourseController::class, 'show'])->name('student.course.detail');

    //Routes about announcement
    Route::resource('courses.announcements', \App\Http\Controllers\Student\AnnouncementController::class)->only([
        'index', 'show'
    ])->names([
        'index' => 'student.courses.announcements.index',
        'show' => 'student.courses.announcements.show',
    ]);

    //Routes about folders
    Route::get('courses/{course}/folders', [StudentFolderController::class, 'index'])->name('student.courses.folders.index');
});


Route::prefix('instructor')->middleware(['auth', 'is_instructor'])->group(function () {
    Route::view('index', 'instructor.index')->middleware('get_all_requirements_ins')->name('instructor.index');

    //Routes about courses
    Route::get('courses/{course}', [\App\Http\Controllers\Instructor\CourseController::class, 'index'])->name('instructor.course.index');
    Route::get('courses/{course}/details', [\App\Http\Controllers\Instructor\CourseController::class, 'show'])->name('instructor.course.detail');

    //Routes about announcement
    Route::resource('courses.announcements', AnnouncementController::class);

    //Routes about folders
    Route::resource('courses.folders', FolderController::class);
});
