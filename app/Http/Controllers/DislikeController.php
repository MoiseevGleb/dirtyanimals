<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\News;

class DislikeController extends Controller
{
    public function dislike(News $news)
    {
        if ($news->isLiked()) {
            Like::query()->where([
                ['user_id', auth()->user()->id],
                ['news_id', $news->id],
            ])->delete();
        }
        Dislike::query()->firstOrCreate([
            'user_id' => auth()->user()->id,
            'news_id' => $news->id,
        ]);
        return redirect(route('news.index'));
    }

    public function undislike(News $news) {
        Dislike::query()->where([
            ['user_id', auth()->user()->id],
            ['news_id', $news->id],
        ])->delete();
        return redirect(route('news.index'));
    }
}
