<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MarketController extends Controller
{
    public function index()
    {
        $products = Product::query()->where('isPublished', 1)->get();
        return view('market.index', compact('products'));
    }

}
