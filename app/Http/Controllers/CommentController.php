<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function send(Request $request, News $news) {
        $data = $request->validate([
           'text' => 'required|string|max:255'
        ]);
        Comment::query()->create([
            'text' => $data['text'],
            'user_id' => auth()->user()->id,
            'news_id' => $news->id,
        ]);
        return redirect(route('news.index'));
    }
}
