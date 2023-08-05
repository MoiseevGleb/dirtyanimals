<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.products.create');
    }

    public function edit(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'desc' => 'string|nullable',
            'price' => 'required|decimal:2',
            'isPublished' => 'required_without:publishDate|boolean',
            'publishDate' => 'required_without:isPublished|nullable|after_or_equal:today|date_format:Y-m-d\TH:i',
            'image' => 'required|file',
        ]);
        $data['isPublished'] = $request->has('isPublished') ? '1' : '0';
        Storage::delete('/images/products/' . $product->image);
        $data['image'] = basename(Storage::put('/images/products/', $request->file('image')));
        $product->update($data);
        return redirect()->route('admin.products');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'desc' => 'nullable|string',
            'price' => 'required|decimal:2',
            'isPublished' => 'required_without:publishDate|boolean',
            'publishDate' => 'required_without:isPublished|nullable|after_or_equal:today|date_format:Y-m-d\TH:i',
            'image' => 'required|file'
        ]);
        $data['isPublished'] = $request->has('isPublished');
        $data['image'] = basename(Storage::put('/images/products/', $request->file('image')));
        Product::query()->create($data);
        return redirect()->route('admin.products');
    }

    public function delete(Product $product)
    {
        $product->delete();
        Storage::delete('/images/products/' . $product->image);
        return redirect(route('admin.products'));
    }
}
