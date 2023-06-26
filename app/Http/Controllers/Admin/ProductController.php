<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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
            'isPublished' => 'boolean',
            'publishDate' => 'date|after_or_equal:today',
        ]);
        $data['isPublished'] = $request->has('isPublished') ? '1' : '0';
        $product->update($data);
        return redirect()->route('admin.products');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'desc' => 'nullable|string',
            'price' => 'required|decimal:2',
            'isPublished' => 'nullable|boolean',
            'publishDate' => 'nullable|date|after_or_equal:today',
        ]);
        $data['isPublished'] = $request->has('isPublished');
        //dd($data);
        Product::query()->create($data);
        return redirect()->route('admin.products');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('admin.products'));
    }
}
