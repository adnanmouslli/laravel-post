<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;



// Route::get('/1', [TestController::class,'firstAction']);
// //Route::get('/adnan', ['App\Http\Controllers\TestController','firstAction']);

// // TestController::class = App\Http\Controllers\TestController



// Route::get('/2', [TestController::class,'secondASction']);



Route::get('/posts', [PostsController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostsController::class,'create'])->name('posts.create');
Route::get('posts/{post}', [PostsController::class, 'show'])->name("posts.show");
Route::get('/posts/{post}/edit', [PostsController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostsController::class,'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostsController::class,'destroy'])->name('posts.destroy');

// Route::get('/', [PostsController::class , 'test']) ;