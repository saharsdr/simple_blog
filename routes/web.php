<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoguotController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
Route::get('/',[PostController::class,'public_post_list'] )->name('home');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::post('/logout',[LoguotController::class,'store'])->name('logout');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/new/poll', [PollController::class,'index'])->name('create_poll');
Route::post('/new/poll', [PollController::class,'store']);


Route::get('/poll/{id}', [PollController::class,'detail'])->name('poll_show');
Route::post('/poll/vote/{id}', [PollController::class,'vote_poll'])->name('vote_poll')->middleware('auth');
Route::post('poll/{id}',[CommentController::class,'poll_new_comment'])->name('poll_new_comment');

Route::get('/edit/poll/{id}', [PollController::class,'editable'])->name('poll_editable');
Route::post('/edit/poll/{id}', [PollController::class,'edit'])->name('edit');


Route::get('/article/{id}',[ArticleController::class,'detail'])->name('article_show');
Route::post('/article/{id}',[CommentController::class,'article_new_comment'])->name('article_new_comment');

Route::get('like/article/{id}',[LikeController::class,'article_like'])->name('article_like')->middleware('auth');
Route::get('like/poll/{id}',[LikeController::class,'poll_like'])->name('poll_like')->middleware('auth');

Route::get('/new/article', [ArticleController::class,'index'])->name('new_article');
Route::post('/new/article', [ArticleController::class,'store'])->name('create_article');

Route::get('/edit/article/{id}', [ArticleController::class,'editable'])->name('article_editable');
Route::post('/edit/article/{id}', [ArticleController::class,'edit_article'])->name('edit_article');

Route::get('/profile/{user}',[UserController::class,'profile'])->name('profile');
Route::get('/admin/posts', [PostController::class,'admin_post_list'])->name('admin_post_list');
Route::get('/admin/post/delete/{id}',[PostController::class,'admin_post_delete'])->name('post_delete');
Route::get('/admin/post/recovery/{id}',[PostController::class,'admin_post_recovery'])->name('post_recovery');

Route::get('admin/users',[UserController::class,'admin_users_list'])->name('admin_users_list');
Route::get('/admin/user/confrim/{user}',[UserController::class,'admin_confrim_user'])->name('admin_confrim_user');
Route::get('/admin/user/unconfrim/{user}',[UserController::class,'admin_unconfrim_user'])->name('admin_unconfrim_user');
Route::get('/admin/user/author/{user}',[UserController::class,'admin_set_user_author'])->name('admin_set_user_author');
Route::get('/admin/user/manual/{user}',[UserController::class,'admin_unset_user_author'])->name('admin_unset_user_author');



