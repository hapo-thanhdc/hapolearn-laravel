<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/hapolearn', [App\Http\Controllers\HomHapolearnController::class, 'index'])->name('home');
Route::post('/api/login', [LoginController::class, 'userLogin'])->name('api.login');
Route::post('/api/register', [RegisterController::class, 'userRegister'])->name('api.register');
Route::get('/api/logout', [LoginController::class, 'userLogout'])->name('api.logout');
