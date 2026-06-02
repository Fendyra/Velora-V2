<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class CheckoutController
{
    public function complete(Request $request): RedirectResponse
    {
        $items = array_values($request->session()->get('velora.cart', []));
        if (count($items) === 0) {
            return redirect()->route('shop');
        }

        $shipMethod = (string) $request->input('shipping', 'regular');
        $shippingFee = match ($shipMethod) {
            'pickup'  => 0,
            'express' => 65000,
            default   => 35000, // regular
        };

        $subtotal = array_reduce($items, fn (int $sum, array $it) => $sum + ((int) $it['price'] * (int) $it['qty']), 0);
        $total = $subtotal + $shippingFee;

        $orderId = 'VL-' . random_int(100000, 999999);

        $request->session()->put('velora.lastOrderId', $orderId);
        $request->session()->put('velora.lastOrderTotal', $total);
        $request->session()->forget('velora.cart');

        return redirect()->route('success', ['orderId' => $orderId, 'total' => $total]);
    }
}
