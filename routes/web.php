<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', [AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'handleLogin'])->name('handle.login');
Route::get('logout',[AuthController::Class,'handleLogout'])->middleware('auth')->name('handle.logout');


Route::view('student/index','student.index')->middleware('auth')->name('student.index');
Route::view('instructor/index', 'instructor.index')->middleware('auth')->name('instructor.index');
