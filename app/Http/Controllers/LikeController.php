<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\News;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(News $news)
    {
        if ($news->isDisliked()) {
            Dislike::query()->where([
                ['user_id', auth()->user()->id],
                ['news_id', $news->id],
            ])->delete();
        }
        Like::query()->firstOrCreate([
            'user_id' => auth()->user()->id,
            'news_id' => $news->id,
        ]);
        return redirect(route('news.index'));
    }

    public function unlike(News $news) {
        Like::query()->where([
            ['user_id', auth()->user()->id],
            ['news_id', $news->id],
        ])->delete();
        return redirect(route('news.index'));
    }
}
