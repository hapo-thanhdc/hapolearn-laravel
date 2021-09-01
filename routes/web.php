<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('allcourses', [CourseController::class, 'index']);
Route::get('search', [CourseController::class, 'courseSearch'])->name('search');
Route::get('courses/detail/{id}', [CourseController::class, 'detail'])->name('courses.detail');
Route::get('allcourses/coursedetail/{id}/search', [LessonController::class, 'search'])->name('filterdetail');
Route::get('insert/{id}', [CourseController::class, 'join'])->middleware('login');
Route::get('review:course.store', [CourseController::class, 'courseStore'])->name('review');
Auth::routes();
