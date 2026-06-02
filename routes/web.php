<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StorefrontController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::get('/verify-email', [AuthController::class, 'verifyEmail'])->name('verification.notice');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/', [StorefrontController::class, 'home'])->name('home');
Route::get('/shop', [StorefrontController::class, 'shop'])->name('shop');
Route::get('/product/{id}', [StorefrontController::class, 'product'])->name('product');
Route::get('/logbook', [StorefrontController::class, 'logbook'])->name('logbook');
Route::get('/checkout', [StorefrontController::class, 'checkout'])->name('checkout');
Route::post('/checkout/complete', [CheckoutController::class, 'complete'])->name('checkout.complete');
Route::get('/success', [StorefrontController::class, 'success'])->name('success');
Route::get('/faq', [StorefrontController::class, 'faq'])->name('faq');
Route::get('/terms', [StorefrontController::class, 'terms'])->name('terms');

Route::get('/atelier', [StorefrontController::class, 'placeholder'])->name('atelier')->defaults('page', 'atelier');
Route::get('/stockists', [StorefrontController::class, 'placeholder'])->name('stockists')->defaults('page', 'stockists');
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AuthController::class, 'account'])->name('account');
    Route::post('/account/password', [AuthController::class, 'updatePassword'])->name('account.password.update');
});

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::post('/wishlist/move', [WishlistController::class, 'moveToBag'])->name('wishlist.move');
Route::post('/wishlist/move-all', [WishlistController::class, 'moveAllToBag'])->name('wishlist.moveAll');
