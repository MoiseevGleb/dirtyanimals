<?php

namespace App\Http\Controllers;

use App\Models\Concert;

class HomeController extends Controller
{
    public function __invoke()
    {
        $concerts = Concert::all();
        return view('home', compact('concerts'));
    }
}
