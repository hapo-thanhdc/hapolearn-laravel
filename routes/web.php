<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('home');
});
//Route::get('allcourse', function () {
//    return view('layouts.all_course');
//});

Route::get('allcourses', [CourseController::class, 'index']);
Route::get('search', [CourseController::class, 'courseSearch'])->name('search');
Auth::routes();
