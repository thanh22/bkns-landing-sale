<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/cart/add/{id}', [CartController::class, 'addCart'])->name('add-cart');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart-checkout');

Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin-index');
    
    Route::get('/banners', [BannerController::class, 'index'])->name('banner-list');
    Route::post('/banner', [BannerController::class, 'create'])->name('banner-create');
    Route::get('/banner/{id}', [BannerController::class, 'detail'])->name('banner-detail');
    Route::post('/banner/{id}/edit', [BannerController::class, 'update'])->name('banner-update');
    Route::get('/banner/{id}/delete', [BannerController::class, 'delete'])->name('banner-delete');
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('category-list');
    Route::post('/category', [CategoryController::class, 'create'])->name('category-create');
    Route::get('/category/{id}', [CategoryController::class, 'detail'])->name('category-detail');
    Route::post('/category/{id}/edit', [CategoryController::class, 'update'])->name('category-update');
    Route::get('/category/{id}/delete', [CategoryController::class, 'delete'])->name('category-delete');
        
    Route::get('/products', [ProductController::class, 'index'])->name('product-list');
    Route::post('/product', [ProductController::class, 'create'])->name('product-create');
    Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product-detail');
    Route::post('/product/{id}/edit', [ProductController::class, 'update'])->name('product-update');
    Route::get('/product/{id}/delete', [ProductController::class, 'delete'])->name('product-delete');
    
    Route::get('/promotions', [PromotionController::class, 'index'])->name('promotion-list');
    Route::get('/promotion/create', [PromotionController::class, 'create'])->name('promotion-create');
    Route::post('/promotion', [PromotionController::class, 'store'])->name('promotion-store');
    Route::get('/promotion/{id}', [PromotionController::class, 'detail'])->name('promotion-detail');
    Route::post('/promotion/{id}/edit', [PromotionController::class, 'update'])->name('promotion-update');
    Route::get('/promotion/{id}/delete', [PromotionController::class, 'delete'])->name('promotion-delete');
    
    Route::get('/information', [InformationController::class, 'index'])->name('information-list');
    Route::post('/information', [InformationController::class, 'store'])->name('information-store');
});

