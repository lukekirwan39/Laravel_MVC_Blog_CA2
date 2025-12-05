<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\AuthorController;

//Route::get('/', function () {
//    return view('front.pages.example');
//});

Route::view('/', 'front.pages.home')->name('home');

Route::get('/article/{any}', [BlogController::class, 'readPost'])->name('read_post');
Route::get('/category/{any}', [BlogController::class, 'categoryPosts'])->name('category_posts');
Route::get('/posts/tag/{any}', [BlogController::class, 'tagPosts'])->name('tag_posts');
Route::get('/search', [BlogController::class, 'searchBlog'])->name('search_posts');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
    ->name('comments.store');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])
    ->name('comments.edit');

Route::put('/comments/{comment}', [CommentController::class, 'update'])
    ->name('comments.update');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');
