<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoguotController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PollController;
use App\Models\Article;
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

Route::get('/new/poll', [PollController::class,'index'])->name('create_poll');
Route::post('/new/poll', [PollController::class,'store']);

Route::get('/', function () {
    return view('users.home');
})->name('home');

Route::get('/poll/{id}', [PollController::class,'detail']);
Route::post('poll/{id}',[CommentController::class,'poll_new_comment'])->name('poll_new_comment');

Route::get('/edit/poll/{id}', [PollController::class,'editable']);
Route::post('/edit/poll/{id}', [PollController::class,'edit'])->name('edit');


Route::get('/article/{id}',[ArticleController::class,'detail']);
Route::post('/article/{id}',[CommentController::class,'article_new_comment'])->name('article_new_comment');

Route::get('/new/article', [ArticleController::class,'index'])->name('new_article');
Route::post('/new/article', [ArticleController::class,'store'])->name('create_article');

Route::get('/edit/article/{id}', [ArticleController::class,'editable']);
Route::post('/edit/article/{id}', [ArticleController::class,'edit_article'])->name('edit_article');

Route::get('/profile', function () {
    return view('users.profile');
});
