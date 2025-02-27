<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PagesController::class, 'index']);
Route::resource('/blog', PostsController::class);

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('/blog', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');
Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
Route::get('/search', [PostsController::class, 'search'])->name('posts.search');
