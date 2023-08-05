<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index() {
        $cart = Cart::query()->where('session_id', session()->getId())->get();
        return view('market.cart.index', compact('cart'));
    }

    public function add(Product $product) {
        if ($cart = Cart::query()->where(['session_id' => session()->getId(), 'product_id' => $product->id])->first()) {;
            $cart->update(['quantity' => $cart->quantity + 1]);
        } else {
            Cart::query()->create([
                'price' => $product->price,
                'product_id' => $product->id,
                'session_id' => session()->getId(),
            ]);
        }
        return redirect(route('cart.index'));
    }

    public function remove(Cart $cart) {
        if ($cart->quantity > 1) {
            $cart->update(['quantity' => $cart->quantity - 1]);
        } else {
            $cart->delete();
        }
        return redirect(route('cart.index'));
    }

    public function clear() {
        $cart = Cart::where('session_id', session()->getId())->get();
        foreach ($cart as $item) {
            $item->delete();
        }
        return redirect(route('market.index'));
    }
}
