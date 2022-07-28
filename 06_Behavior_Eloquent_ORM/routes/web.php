<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::get('posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('posts/{post}/forceDelete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');
Route::resource('posts', PostController::class);

Route::fallback(function(){
    echo "<h2> Rota inesistente!</h2>";
});
