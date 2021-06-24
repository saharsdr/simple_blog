<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoguotController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::post('/logout',[LoguotController::class,'store'])->name('logout');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/', function () {
    return view('users.home');
});
Route::get('/how', function () {
    return view('users.poll');
});
Route::get('/hom', function () {
    return view('users.article');
});
Route::get('/new/article', function () {
    return view('users.new_article');
});
Route::get('/new/poll', function () {
    return view('users.new_poll');
});
Route::get('/edit/poll', function () {
    return view('users.edit_poll');
});
Route::get('/profile', function () {
    return view('users.profile');
});
