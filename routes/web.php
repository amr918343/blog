<?php

use Illuminate\Support\Facades\Route;

// using controlers
use App\Http\Controllers\Post\PostController;

use App\Http\Controllers\Comment\CommentController;
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

/**************************Post controllers**********************/
Route::get('/', [PostController::class, 'index']);
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');



Route::post('/post/{id}/comment', [CommentController::class, 'store'])->name('post.comment.store');


/**************************Like controllers**********************/
Route::post('post/like', [LikeController::class, 'store'])->name('post.like.store');


/**************************Protected controllers**********************/
Route::group(['middleware' => 'auth'], function () {

    /**************************Profile controllers**********************/
    Route::get('/profile', [PostController::class, 'getUserPosts'])->name('user.posts.show');

    Route::get('/profile/post/create', [PostController::class, 'create'])->name('user.post.create');

    Route::post('/profile/post', [PostController::class, 'store'])->name('user.post.store');

    Route::get('/profile/post/{id}', [PostController::class, 'edit'])->name('user.post.edit');

    Route::put('/profile/post/{id}', [PostController::class, 'update'])->name('user.post.update');

    Route::delete('/profile/post/{id}', [PostController::class, 'destroy'])->name('user.post.delete');

});
