<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;

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
Route::get('allcourses', [CourseController::class, 'index'])->name('allcourse');
Route::get('search', [CourseController::class, 'search'])->name('search');
Route::get('courses/detail/{id}', [CourseController::class, 'detail'])->name('courses.detail');
Route::get('allcourses/coursedetail/{id}/search', [LessonController::class, 'search'])->name('filterdetail');
Route::get('insert/{id}', [CourseController::class, 'join'])->middleware('login');
Route::get('leave/{id}', [CourseController::class, 'leave'])->middleware('login');
Route::post('course_review', [CourseController::class, 'addReview'])->name('review.course.store');
Route::get('allcourses/coursedetail/lesson/{id}', [LessonController::class, 'index'])->name('lessons.detail');
Route::get('/view/{file}', [DocumentController::class, 'show']);
Route::post('/learning', [DocumentController::class, 'learning']);
Route::get('/profile', [UserController::class, 'index'])->middleware('login');
Route::post('/profile/edit', [UserController::class, 'update'])->middleware('login');
Auth::routes();
