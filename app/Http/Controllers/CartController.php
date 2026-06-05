<?php

namespace App\Http\Controllers;

use App\Support\VeloraCatalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class CartController
{
    public function add(Request $request): RedirectResponse
    {
        $productId = (string) $request->input('id');
        $size = (string) $request->input('size');
        $color = (string) $request->input('color');
        $qty = max(1, (int) $request->input('qty', 1));

        $product = VeloraCatalog::findProduct($productId);
        $sizes = $product['sizes'];
        $colors = $product['colors'];

        if (!in_array($size, $sizes, true)) {
            $size = $sizes[(int) floor(count($sizes) / 2)] ?? ($sizes[0] ?? 'M');
        }
        if (!in_array($color, $colors, true)) {
            $color = $colors[0] ?? 'Bone';
        }

        $key = $product['id'] . '-' . $size . '-' . $color;
        $cart = $request->session()->get('velora.cart', []);

        if (isset($cart[$key])) {
            $cart[$key]['qty'] = (int) $cart[$key]['qty'] + $qty;
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
                'qty' => $qty,
            ];
        }

        $request->session()->put('velora.cart', $cart);

        return back()->with('toast', 'Added · ' . $product['name']);
    }

    public function update(Request $request): RedirectResponse
    {
        $key = (string) $request->input('key');
        $delta = (int) $request->input('delta', 0);

        $cart = $request->session()->get('velora.cart', []);
        if (!isset($cart[$key])) {
            return back();
        }

        $newQty = (int) $cart[$key]['qty'] + $delta;
        
        if ($newQty <= 0) {
            unset($cart[$key]);
        } else {
            $cart[$key]['qty'] = $newQty;
        }
        
        $request->session()->put('velora.cart', $cart);

        return back();
    }

    public function remove(Request $request): RedirectResponse
    {
        $key = (string) $request->input('key');

        $cart = $request->session()->get('velora.cart', []);
        unset($cart[$key]);
        $request->session()->put('velora.cart', $cart);

        return back();
    }

    public function clear(Request $request): RedirectResponse
    {
        $request->session()->forget('velora.cart');

        return back();
    }

    public function prepareCheckout(Request $request): RedirectResponse
    {
        $selectedKeys = $request->input('selected_items', []);
        
        if (empty($selectedKeys) || !is_array($selectedKeys)) {
            return back()->with('toast', 'Please select at least one item to checkout.');
        }

        $request->session()->put('velora.checkout_keys', $selectedKeys);

        return redirect()->route('checkout');
    }
}
