<?php

use Illuminate\Support\Facades\Route;

// using controlers
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserPostController;
use App\Http\Controllers\Post\PostCommentController;
use App\Http\Controllers\Like\LikeController;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes

/**************************Post controllers**********************/
Route::get('/', [PostController::class, 'index']);
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');
Route::post('/post/{id}/comment', [PostCommentController::class, 'store'])->name('post.comment.store');

Route::put('post/like', [LikeController::class, 'toggle'])->name('post.like.toggle');

// Protected routes
Route::group(['middleware' => 'auth'], function() {

    /**************************User controllers**********************/
    Route::get('/profile', [UserPostController::class, 'show'])->name('user.post.show');
    Route::post('/profile/post', [UserPostController::class, 'store'])->name('user.post.store');
    Route::put('/profile/post/{id}', [UserPostController::class, 'update'])->name('user.post.update');
    Route::delete('/profile/post/{id}', [UserPostController::class, 'destroy'])->name('user.post.delete');
});