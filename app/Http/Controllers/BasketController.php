<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Show basket
     */
    public function basket()
    {
        $orderId = session('orderId');

        if (!is_null('orderId')) {
            $order = Order::findOrFail($orderId);
        }

        return view('basket', compact('order'));
    }

    public function basketPlace()
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('index');
        }

        $order = Order::find($orderId);

        return view('order', compact('order'));
    }

    /**
     * Add product to basket
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

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        $product = Product::find($productId);
        session()->flash('success', 'Товар добавлен в корзину: ' . $product->name);

        return redirect()->route('basket');
    }

    /**
     * Remove product from basket
     */
    public function basketRemove($productId)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('basket');
        }

        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;

            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $product = Product::find($productId);
        session()->flash('warning', 'Товар удален из корзины: ' . $product->name);

        return redirect()->route('basket');
    }

    /**
     * Place order with basket products
     */
    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('index');
        }

        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if ($success) {
            session()->flash('success', 'Заказ принят в работу');
        } else {
            session()->flash('warning', 'Ошибка при формировании заказа');
        }

        return redirect()->route('index');
    }
}