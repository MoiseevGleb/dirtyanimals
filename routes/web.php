<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::view('/login', 'login')->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::view('/registration', 'register')->name('register.index');
Route::post('/registration', [AuthController::class, 'register'])->name('register');

Route::group([
    'as' => 'market.',
    'prefix' => 'market',
], function () {
    Route::get('/', [MarketController::class, 'index'])->name('index');
    Route::view('/show', 'market.show')->name('show');
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin'],
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/news', [AdminController::class, 'news'])->name('news');

    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');

    Route::get('/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/edit/{news}', [NewsController::class, 'update'])->name('news.update');

    Route::delete('/news/delete/{news}', [NewsController::class, 'delete'])->name('news.delete');

    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/edit/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::delete('/products/delete/{product}', [ProductController::class, 'delete'])->name('products.delete');

    Route::patch('/setadmin/{user}', [AdminController::class, 'setAdmin'])->name('setAdmin');
    Route::patch('/unsetadmin/{user}', [AdminController::class, 'unsetAdmin'])->name('unsetAdmin');
});

Route::group([
    'as' => 'user.',
    'prefix' => 'user',
    'middleware' => 'auth',
], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
});
