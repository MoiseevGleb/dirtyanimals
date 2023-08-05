<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConcertController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CartController;
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
    'as' => 'cart.',
    'prefix' => 'cart',
], function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('add/{product}', [CartController::class, 'add'])->name('add');
    Route::post('remove/{cart}', [CartController::class, 'remove'])->name('remove');
    Route::post('clear', [CartController::class, 'clear'])->name('clear');
});

Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::post('/like/{news}', [LikeController::class, 'like'])->name('like');
Route::delete('/unlike/{news}', [LikeController::class, 'unlike'])->name('unlike');
Route::post('/dislike/{news}', [DislikeController::class, 'dislike'])->name('dislike');
Route::delete('/undislike/{news}', [DislikeController::class, 'undislike'])->name('undislike');
Route::post('/comment/{news}', [CommentController::class, 'send'])->name('comment.send');

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin'],
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/news', [AdminController::class, 'news'])->name('news');
    Route::get('/concerts', [AdminController::class, 'concerts'])->name('concerts');
    Route::get('/slider', [AdminController::class, 'slider'])->name('slider');

    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/edit/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/delete/{news}', [NewsController::class, 'delete'])->name('news.delete');

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/edit/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{product}', [ProductController::class, 'delete'])->name('products.delete');

    Route::patch('/setadmin/{user}', [AdminController::class, 'setAdmin'])->name('setAdmin');
    Route::patch('/unsetadmin/{user}', [AdminController::class, 'unsetAdmin'])->name('unsetAdmin');

    Route::get('/concerts/create', [ConcertController::class, 'create'])->name('concerts.create');
    Route::post('/concerts/create', [ConcertController::class, 'store'])->name('concerts.store');
    Route::patch('/concerts/edit/{concert}', [ConcertController::class, 'update'])->name('concerts.update');
    Route::get('/concerts/show/{concert}', [ConcertController::class, 'show'])->name('concerts.show');
    Route::delete('/concerts/delete/{concert}', [ConcertController::class, 'delete'])->name('concerts.delete');

    Route::delete('/slider/delete/{slide}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('/slider/edit/{slide}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::patch('/slider/edit/{slide}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider/create', [SliderController::class, 'store'])->name('slider.store');
});

Route::group([
    'as' => 'user.',
    'prefix' => 'user',
    'middleware' => 'auth',
], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
});
