<?php

namespace App\Http\Controllers\Admin;



use App\Models\News;
use Illuminate\Http\Request;

class NewsController
{
    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
        ]);
        News::query()->create($data);
        return redirect()->route('admin.news');
    }

    public function edit(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
        ]);
        $news->update($data);
        return redirect()->route('admin.news');
    }

    public function delete(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news');
    }
}
