<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoguotController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
Route::get('/',[PostController::class,'home'] )->name('home');

Route::post('/logout',[LoguotController::class,'store'])->name('logout')->middleware('auth');
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'store'])->middleware('guest');

Route::get('/register',[RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');

Route::get('/new/poll', [PollController::class,'index'])->name('create_poll')->middleware('auth');
Route::post('/new/poll', [PollController::class,'store'])->middleware('auth');


Route::get('/poll/{id}', [PollController::class,'detail'])->name('poll_show');
Route::post('/poll/vote/{id}', [PollController::class,'vote_poll'])->name('vote_poll')->middleware('auth');
Route::post('poll/{id}',[CommentController::class,'poll_new_comment'])->name('poll_new_comment');

Route::get('/edit/poll/{id}', [PollController::class,'editable'])->name('poll_editable')->middleware('auth');
Route::post('/edit/poll/{id}', [PollController::class,'edit'])->name('edit')->middleware('auth');


Route::get('/article/{id}',[ArticleController::class,'detail'])->name('article_show');
Route::post('/article/{id}',[CommentController::class,'article_new_comment'])->name('article_new_comment');

Route::get('like/article/{id}',[LikeController::class,'article_like'])->name('article_like')->middleware('auth');
Route::get('like/poll/{id}',[LikeController::class,'poll_like'])->name('poll_like')->middleware('auth');

Route::get('/new/article', [ArticleController::class,'index'])->name('new_article')->middleware('auth');
Route::post('/new/article', [ArticleController::class,'store'])->name('create_article')->middleware('auth');

Route::get('/edit/article/{id}', [ArticleController::class,'editable'])->name('article_editable')->middleware('auth');
Route::post('/edit/article/{id}', [ArticleController::class,'edit_article'])->name('edit_article')->middleware('auth');

Route::get('/profile/{user}',[UserController::class,'profile'])->name('profile')->middleware('auth');

Route::get('/admin/posts', [PostController::class,'admin_post_list'])->name('admin_post_list')->middleware('auth');
Route::get('/admin/post/delete/{id}',[PostController::class,'admin_post_delete'])->name('post_delete')->middleware('auth');
Route::get('/admin/post/recovery/{id}',[PostController::class,'admin_post_recovery'])->name('post_recovery')->middleware('auth');
Route::get('/admin/post/{id}/comments',[PostController::class,'admin_comments'])->name('admin_comments')->middleware('auth');
Route::get('/admin/post/{id}/result',[PollController::class,'admin_poll_result'])->name('poll_result');

Route::get('/admin/comment/{id}/delete',[CommentController::class,'delete_comment'])->name('delete_comment')->middleware('auth');
Route::get('/admin/comment/{id}/recovery',[CommentController::class,'recovery_comment'])->name('recovery_comment')->middleware('auth');

Route::get('admin/users',[UserController::class,'admin_users_list'])->name('admin_users_list')->middleware('auth');
Route::get('/admin/user/confrim/{user}',[UserController::class,'admin_confrim_user'])->name('admin_confrim_user')->middleware('auth');
Route::get('/admin/user/unconfrim/{user}',[UserController::class,'admin_unconfrim_user'])->name('admin_unconfrim_user')->middleware('auth');
Route::get('/admin/user/author/{user}',[UserController::class,'admin_set_user_author'])->name('admin_set_user_author')->middleware('auth');
Route::get('/admin/user/manual/{user}',[UserController::class,'admin_unset_user_author'])->name('admin_unset_user_author')->middleware('auth');

Route::get('/admin/group',[GroupController::class,'index'])->name('admin_group_list')->middleware('auth');
Route::get('/admin/new/group',[GroupController::class,'index_new'])->name('admin_new_group')->middleware('auth');
Route::post('/admin/new/group',[GroupController::class,'store'])->name('admin_store_group')->middleware('auth');
Route::get('/admin/group/{id}/edit',[GroupController::class,'editable'])->name('admin_editable_group')->middleware('auth');
Route::post('/admin/group/{id}/edit',[GroupController::class,'edit'])->name('admin_edit_group')->middleware('auth');
Route::get('/admin/group/{id}/delet',[GroupController::class,'delete'])->name('admin_delete_group')->middleware('auth');
Route::get('/admin/group/{id}/recovery',[GroupController::class,'recovery'])->name('admin_recovery_group')->middleware('auth');
// Route::post('/admin/group/posts',[GroupController::class,'posts'])->name('admin_posts_group')->middleware('auth');






