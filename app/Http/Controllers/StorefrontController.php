<?php

namespace App\Http\Controllers;

use App\Support\VeloraCatalog;
use App\Mail\SayHiEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

final class StorefrontController
{
    public function home()
    {
        return view('pages.home', [
            'featured' => array_slice(VeloraCatalog::products(), 0, 4),
            'productsCount' => count(VeloraCatalog::products()),
            'collections' => VeloraCatalog::collections(),
            'jakartaTime' => now('Asia/Jakarta')->format('H:i:s'),
        ]);
    }

    public function shop(Request $request)
    {
        $all = VeloraCatalog::products();

        $collection = (string) $request->query('collection', 'All');
        $size = (string) $request->query('size', 'All');
        $sort = (string) $request->query('sort', 'featured');
        $view = (string) $request->query('view', 'grid');
        $q = (string) $request->query('q', '');

        $collections = ['All', ...array_values(array_unique(array_map(fn (array $p) => $p['collection'], $all)))];
        $sizes = ['All', 'XS', 'S', 'M', 'L', 'XL'];

        $filtered = $all;
        
        if ($q !== '') {
            $filtered = array_values(array_filter($filtered, fn (array $p) => stripos($p['name'], $q) !== false || stripos($p['sku'] ?? $p['id'], $q) !== false));
        }
        
        if ($collection !== 'All') {
            $filtered = array_values(array_filter($filtered, fn (array $p) => $p['collection'] === $collection));
        }
        if ($size !== 'All') {
            $filtered = array_values(array_filter($filtered, fn (array $p) => in_array($size, $p['sizes'], true)));
        }

        if ($sort === 'price-asc') {
            usort($filtered, fn (array $a, array $b) => $a['price'] <=> $b['price']);
        } elseif ($sort === 'price-desc') {
            usort($filtered, fn (array $a, array $b) => $b['price'] <=> $a['price']);
        } elseif ($sort === 'name') {
            usort($filtered, fn (array $a, array $b) => strcasecmp($a['name'], $b['name']));
        } elseif ($sort === 'newest') {
            usort($filtered, fn (array $a, array $b) => strcmp($b['id'], $a['id']));
        }

        return view('pages.shop', [
            'all' => $all,
            'filtered' => $filtered,
            'collections' => $collections,
            'sizes' => $sizes,
            'collection' => $collection,
            'size' => $size,
            'sort' => $sort,
            'viewMode' => in_array($view, ['grid', 'list'], true) ? $view : 'grid',
            'q' => $q,
        ]);
    }

    public function product(string $id)
    {
        $p = VeloraCatalog::findProduct($id);

        $sizes = $p['sizes'];
        $defaultSize = $sizes[(int) floor(count($sizes) / 2)] ?? ($sizes[0] ?? 'M');
        $defaultColor = $p['colors'][0] ?? 'Bone';

        $related = array_values(array_filter(VeloraCatalog::products(), fn (array $x) => $x['id'] !== $p['id']));
        $related = array_slice($related, 0, 4);

        $wishlistIds = session()->get('velora.wishlist', []);
        $inWishlist = in_array($p['id'], $wishlistIds, true);

        return view('pages.product', [
            'product' => $p,
            'defaultSize' => $defaultSize,
            'defaultColor' => $defaultColor,
            'related' => $related,
            'inWishlist' => $inWishlist,
        ]);
    }

    public function logbook(Request $request)
    {
        $all = VeloraCatalog::logbook();
        $tag = (string) $request->query('tag', 'All');

        $tags = ['All', ...array_values(array_unique(array_map(fn (array $e) => $e['tag'], $all)))];
        $entries = $tag === 'All' ? $all : array_values(array_filter($all, fn (array $e) => $e['tag'] === $tag));

        return view('pages.logbook', [
            'tag' => $tag,
            'tags' => $tags,
            'entries' => $entries,
            'allCount' => count($all),
        ]);
    }

    public function checkout()
    {
        $allCartItems = session('velora.cart', []);
        $checkoutKeys = session('velora.checkout_keys', []);
        
        // Filter the cart to only include the items selected for checkout
        $items = array_filter($allCartItems, fn ($it) => in_array($it['key'], $checkoutKeys, true));
        $items = array_values($items);
        
        // If no valid items are found, maybe the session expired or user accessed directly
        if (count($items) === 0 && count($allCartItems) > 0) {
            return redirect()->route('shop')->with('toast', 'Please select items from your bag to checkout.');
        }

        return view('pages.checkout', [
            'items' => $items
        ]);
    }

    public function payment(string $order_number)
    {
        $order = \App\Models\Order::where('order_number', $order_number)->firstOrFail();
        
        return view('pages.payment', [
            'order' => $order
        ]);
    }

    public function cancelPayment(string $order_number)
    {
        $order = \App\Models\Order::where('order_number', $order_number)->firstOrFail();
        
        if ($order->payment_status === 'unpaid' || $order->payment_status === 'pending') {
            $order->update([
                'status' => 'cancelled',
                'payment_status' => 'cancelled'
            ]);
        }

        return redirect()->route('shop')->with('toast', 'Order cancelled.');
    }

    public function success(Request $request)
    {
        $orderId = (string) $request->query('orderId', session()->get('velora.lastOrderId', 'VL-000000'));
        $total = (int) $request->query('total', session()->get('velora.lastOrderTotal', 0));

        return view('pages.success', [
            'orderId' => $orderId,
            'total' => $total,
        ]);
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function terms()
    {
        return view('pages.terms', [
            'today' => now()->locale('en_GB')->translatedFormat('d F Y'),
        ]);
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function shipping()
    {
        return view('pages.shipping');
    }

    public function atelier()
    {
        return view('pages.atelier');
    }

    public function stockists()
    {
        return view('pages.stockists');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        Mail::to($request->email)->send(new SayHiEmail());

        return back()->with('success_newsletter', 'Thank you. We will be in touch.');
    }

    public function placeholder(string $page)
    {
        $titles = [
            'account' => ['kicker' => '/ ACCOUNT', 'big' => 'Welcome', 'italic' => 'back.'],
        ];

        abort_unless(isset($titles[$page]), 404);

        return view('pages.placeholder', [
            'routeKey' => $page,
            'title' => $titles[$page],
        ]);
    }
}
