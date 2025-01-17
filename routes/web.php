<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/book',[BookController::class, 'index'])->name('book.index');
Route::get('/book/create',[BookController::class, 'create'])->name('book.create');
Route::post('/book',[BookController::class, 'store'])->name('book.store');
Route::get('/book/{id}/edit',[BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{id}',[BookController::class, 'update'])->name('book.update');
Route::delete('/book/{id}',[BookController::class, 'destroy'])->name('book.destroy');

Route::get('/author',[AuthorController::class, 'index'])->name('author.index');
Route::get('/author/create',[AuthorController::class, 'create'])->name('author.create');
Route::post('/author',[AuthorController::class, 'store'])->name('author.store');
Route::get('/author/{id}/edit',[AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/{id}',[AuthorController::class, 'update'])->name('author.update');
Route::delete('/author/{id}',[AuthorController::class, 'destroy'])->name('author.destroy');

Route::get('/post',[PostController::class, 'index'])->name('post.index');
Route::get('/post/create',[PostController::class, 'create'])->name('post.create');
Route::post('/post',[PostController::class, 'store'])->name('post.store');
Route::get('/post/{id}/edit',[PostController::class, 'edit'])->name('post.edit');
Route::put('/post/{id}',[PostController::class, 'update'])->name('post.update');
Route::delete('/post/{id}',[PostController::class, 'destroy'])->name('post.destroy');

Route::get('/comment',[CommentController::class, 'index'])->name('comment.index');
Route::get('/comment/create',[CommentController::class, 'create'])->name('comment.create');
Route::post('/comment',[CommentController::class, 'store'])->name('comment.store');
Route::get('/comment/{id}/edit',[CommentController::class, 'edit'])->name('comment.edit');
Route::put('/comment/{id}',[CommentController::class, 'update'])->name('comment.update');
Route::delete('/comment/{id}',[CommentController::class, 'destroy'])->name('comment.destroy');


require __DIR__.'/auth.php';
