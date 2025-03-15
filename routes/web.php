<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

// Home Page Route
Route::get('/', [PagesController::class, 'index'])->name('home');

// About Page Route
Route::get('/about', [PagesController::class, 'about'])->name('about');

// ✅ Contact Page Route (NEW)
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// Blog Routes
Route::resource('/blog', PostsController::class);
Route::get('/posts/{slug}', [PostsController::class, 'show'])->name('posts.show');Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/search', [PostsController::class, 'search'])->name('posts.search');

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/posts/{slug}', [BlogController::class, 'show'])->name('posts.show');

Route::get('/categories', function () {
    $categories = \App\Models\Category::all();
    return view('categories.index', compact('categories'));
})->name('categories.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/create', [AdminController::class, 'createPost'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'storePost'])->name('admin.store');
    Route::post('/posts/{postId}/comment', [CommentController::class, 'store'])->name('comments.store');
});

// Authentication Routes
Auth::routes();

// Dashboard & Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
