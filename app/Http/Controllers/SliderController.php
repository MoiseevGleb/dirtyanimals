<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function create() {
        return view('admin.slider.create');
    }

    public function store(Request $request) {
        $request->validate([
            'slide' => 'required|image'
        ]);
        Storage::put('/images/slider', $request['slide']);
        return redirect(route('admin.slider'));
    }

    public function delete($slide) {
        Storage::delete('/images/slider/' . $slide);
        return redirect(route('admin.slider'));
    }

    public function edit($slide) {
        $image = Storage::url($slide);
        $image = basename($image);
        return view('admin.slider.edit', compact('image'));
    }

    public function update(Request $request, $image) {
        $request->validate([
            'slide' => 'required|image'
        ]);
        $slide = $request->file('slide');
        Storage::delete('/images/slider/' . $image );
        Storage::put('/images/slider', $slide);
        return redirect(route('admin.slider'));
    }
}
