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
Route::get('/lookbook', [StorefrontController::class, 'lookbook'])->name('lookbook');
Route::get('/success', [StorefrontController::class, 'success'])->name('success');
Route::get('/faq', [StorefrontController::class, 'faq'])->name('faq');
Route::get('/terms', [StorefrontController::class, 'terms'])->name('terms');
Route::get('/privacy', [StorefrontController::class, 'privacy'])->name('privacy');
Route::get('/shipping', [StorefrontController::class, 'shipping'])->name('shipping');

Route::get('/atelier', [StorefrontController::class, 'atelier'])->name('atelier');
Route::get('/stockists', [StorefrontController::class, 'stockists'])->name('stockists');
Route::post('/subscribe', [StorefrontController::class, 'subscribe'])->name('newsletter.subscribe');

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AuthController::class, 'account'])->name('account');
    Route::post('/account/password', [AuthController::class, 'updatePassword'])->name('account.password.update');
    
    // Checkout & Payment
    Route::get('/checkout', [StorefrontController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/complete', [CheckoutController::class, 'complete'])->name('checkout.complete');
    Route::get('/payment/{order_number}', [StorefrontController::class, 'payment'])->name('payment.page');
    Route::post('/payment/{order_number}/cancel', [StorefrontController::class, 'cancelPayment'])->name('payment.cancel');
});

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/checkout/prepare', [CartController::class, 'prepareCheckout'])->name('cart.checkout.prepare');

Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::post('/wishlist/move', [WishlistController::class, 'moveToBag'])->name('wishlist.move');
Route::post('/wishlist/move-all', [WishlistController::class, 'moveAllToBag'])->name('wishlist.moveAll');
