<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concert;
use App\Models\News;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function products()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function setAdmin(User $user)
    {
        $user->update(['isAdmin' => 1]);
        return back();
    }

    public function unsetAdmin(User $user)
    {
        $user->update(['isAdmin' => 0]);
        return back();
    }

    public function news()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function concerts() {
        $concerts = Concert::all();
        return view('admin.concerts.index', compact('concerts'));
    }

    public function slider() {
        $imageFiles = glob(public_path('storage/images/slider/*'));
        $images = [];

        foreach ($imageFiles as $image) {
            $images[] = basename($image);
        }

        return view('admin.slider.index', compact('images'));
    }
}
