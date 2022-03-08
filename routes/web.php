<?php

use Illuminate\Support\Facades\Route;

// using controlers
use App\Http\Controllers\Post\PostController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function() {
    return view('posts.show');
});

// Routes
Route::get('/', [PostController::class, 'index']);
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');