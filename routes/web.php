<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::get('/post/{post}', [PublicController::class, 'post'])->name('post');


// Route::resource('tags', \App\Http\Controllers\TagController::class);
// Route::post('tags', [TagController::class, 'store'])->middleware('can:create,App\Models\Tag');
Route::resource('tags', TagController::class);
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tag/{tag}', [PublicController::class, 'tag'])->name('tag');
Route::get('tags/create', [TagController::class, 'create'])->name('tags.create');
Route::middleware('auth')->group(function () {
    Route::resource('tags', TagController::class);
});



Route::resource('comments', CommentController::class);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comment/{comment}', [PublicController::class, 'comment'])->name('comment');
Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/posts', PostController::class);
    Route::resource('/admin/comments', CommentController::class);
    Route::resource('/admin/tags', TagController::class);

    Route::post('/post/{post}/like', [PublicController::class, 'like'])->name('like');
    Route::resource('/post/comments/create/', CommentController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    
    
});

require __DIR__.'/auth.php';
