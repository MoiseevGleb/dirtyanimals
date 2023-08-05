<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function create() {
        return view('admin.concerts.create');
    }

    public function store(Request $request) {

        $data = $request->validate([
            'city' => 'required|string',
        ]);
        Concert::firstOrCreate(['city' => $data['city']], [
            'city' => $data['city'],
        ]);
        return redirect(route('admin.concerts'));
    }

    public function show(Concert $concert) {
        return view('admin.concerts.show', compact('concert'));
    }

    public function update(Request $request, Concert $concert) {
        $data = $request->validate([
            'city' => 'required|string'
        ]);
        $concert->update($data);
        return redirect(route('admin.concerts'));
    }

    public function delete(Concert $concert) {
        $concert->delete();
        return redirect(route('admin.concerts'));
    }
}
