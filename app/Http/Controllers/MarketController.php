<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;

class MarketController extends Controller
{
    public function index()
    {
        $imageFiles = glob(public_path('storage/images/slider/*'));
        $images = [];
        foreach ($imageFiles as $image) {
            $images[] = basename($image);
        }

        $products = Product::query()->where('isPublished', 1)->orWhere('publishDate', '<=', Carbon::now())->get();
        return view('market.index', compact('products', 'images'));
    }

}
