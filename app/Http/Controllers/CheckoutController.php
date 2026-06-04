<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $order = Order::create([
            'order_number' => $orderId,
            'customer_name' => $request->input('firstName') . ' ' . $request->input('lastName'),
            'customer_email' => $request->input('email'),
            'user_id' => Auth::id(),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'status' => 'pending',
            'shipping_method' => $shipMethod,
            'shipping_fee' => $shippingFee,
            'total_amount' => $total,
        ]);

        foreach ($items as $item) {
            $product = \App\Models\Product::where('sku', $item['id'])->first();
            
            $order->items()->create([
                'product_id' => $product ? $product->id : null,
                'product_name' => $item['name'],
                'size' => $item['size'],
                'color' => $item['color'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        $request->session()->put('velora.lastOrderId', $orderId);
        $request->session()->put('velora.lastOrderTotal', $total);
        $request->session()->forget('velora.cart');

        return redirect()->route('success', ['orderId' => $orderId, 'total' => $total]);
    }
}
