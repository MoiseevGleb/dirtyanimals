<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Product;
use App\Models\User;


class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
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
}
