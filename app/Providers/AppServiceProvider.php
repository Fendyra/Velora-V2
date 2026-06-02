<?php

namespace App\Providers;

use App\Support\VeloraCatalog;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session()->get('velora.cart', []);
            $cartItems = array_values($cart);
            $cartCount = array_reduce($cartItems, fn (int $sum, array $it) => $sum + (int) ($it['qty'] ?? 0), 0);

            $wishlistIds = session()->get('velora.wishlist', []);
            $wishlistIds = array_values(array_unique(array_filter($wishlistIds)));
            $wishlistItems = array_map(fn (string $id) => VeloraCatalog::findProduct($id), $wishlistIds);

            $view->with([
                'veloraCartItems' => $cartItems,
                'veloraCartCount' => $cartCount,
                'veloraWishlistItems' => $wishlistItems,
                'veloraWishlistCount' => count($wishlistItems),
            ]);
        });
    }
}
