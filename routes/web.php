<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('user.index');
});

Route::prefix('user')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('user.login');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/filter', [UserController::class, 'filterUserPost'])->name('user.filter');
});
Route::prefix('post')->group(function () {

    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/toggleActive/{id}', [PostController::class, 'toggleActive'])->name('post.toggleActive');
    Route::post('/filter', [PostController::class, 'filter'])->name('filter');
});
