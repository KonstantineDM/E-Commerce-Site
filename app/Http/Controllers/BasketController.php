<?php

namespace App\Http\Controllers;

use App\Models\Order;

class BasketController extends Controller
{
    /**
     * Show basket
     */
    public function basket() {
        $orderId = session('orderId');

        if (!is_null('orderId')) {
            $order = Order::findOrFail($orderId);
        }

        return view('basket', compact('order'));
    }

    public function basketOrder() {
        return view('order', compact('order'));
    }

    /**
     * Add product to the basket
     */
    public function basketAdd($productId)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        $order->products()->attach($productId);

        return view('basket', compact('order'));
    }
}
