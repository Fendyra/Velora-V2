<?php

namespace App\Http\Controllers;

use App\Support\VeloraCatalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class WishlistController
{
    public function toggle(Request $request): RedirectResponse
    {
        $id = (string) $request->input('id');

        $wishlist = $request->session()->get('velora.wishlist', []);
        $wishlist = array_values(array_unique(array_filter($wishlist)));

        if (in_array($id, $wishlist, true)) {
            $wishlist = array_values(array_filter($wishlist, fn (string $x) => $x !== $id));
            $request->session()->put('velora.wishlist', $wishlist);

            return back()->with('toast', 'Removed from wishlist');
        }

        $wishlist[] = $id;
        $request->session()->put('velora.wishlist', $wishlist);

        $p = VeloraCatalog::findProduct($id);
        return back()->with('toast', 'Saved · ' . $p['name']);
    }

    public function remove(Request $request): RedirectResponse
    {
        $id = (string) $request->input('id');
        $wishlist = $request->session()->get('velora.wishlist', []);
        $wishlist = array_values(array_filter($wishlist, fn (string $x) => $x !== $id));
        $request->session()->put('velora.wishlist', $wishlist);

        return back();
    }

    public function moveToBag(Request $request): RedirectResponse
    {
        $id = (string) $request->input('id');
        $product = VeloraCatalog::findProduct($id);

        $size = $product['sizes'][(int) floor(count($product['sizes']) / 2)] ?? ($product['sizes'][0] ?? 'M');
        $color = $product['colors'][0] ?? 'Bone';

        $key = $product['id'] . '-' . $size . '-' . $color;
        $cart = $request->session()->get('velora.cart', []);

        if (isset($cart[$key])) {
            $cart[$key]['qty'] = (int) $cart[$key]['qty'] + 1;
        } else {
            $cart[$key] = [
                'key' => $key,
                'id' => $product['id'],
                'name' => $product['name'],
                'collection' => $product['collection'],
                'price' => $product['price'],
                'image' => $product['image'],
                'size' => $size,
                'color' => $color,
                'qty' => 1,
            ];
        }
        $request->session()->put('velora.cart', $cart);

        $wishlist = $request->session()->get('velora.wishlist', []);
        $wishlist = array_values(array_filter($wishlist, fn (string $x) => $x !== $id));
        $request->session()->put('velora.wishlist', $wishlist);

        return back()->with('toast', 'Moved · ' . $product['name']);
    }

    public function moveAllToBag(Request $request): RedirectResponse
    {
        $wishlist = $request->session()->get('velora.wishlist', []);
        $wishlist = array_values(array_unique(array_filter($wishlist)));

        foreach ($wishlist as $id) {
            $product = VeloraCatalog::findProduct((string) $id);
            $size = $product['sizes'][(int) floor(count($product['sizes']) / 2)] ?? ($product['sizes'][0] ?? 'M');
            $color = $product['colors'][0] ?? 'Bone';

            $key = $product['id'] . '-' . $size . '-' . $color;
            $cart = $request->session()->get('velora.cart', []);
            if (isset($cart[$key])) {
                $cart[$key]['qty'] = (int) $cart[$key]['qty'] + 1;
            } else {
                $cart[$key] = [
                    'key' => $key,
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'collection' => $product['collection'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'size' => $size,
                    'color' => $color,
                    'qty' => 1,
                ];
            }
            $request->session()->put('velora.cart', $cart);
        }

        $request->session()->put('velora.wishlist', []);

        return back()->with('toast', 'Moved all to bag');
    }
}
