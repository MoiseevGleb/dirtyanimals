<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes(): HasMany
    {
        return $this->hasMany(Dislike::class);
    }

    public function isLiked(): bool
    {
        $like = Like::query()->where([
            ['user_id', auth()->user()->id],
            ['news_id', $this->id],
        ])->first();
        return (bool)$like;
    }

    public function isDisliked(): bool
    {
        $dislike = Dislike::query()->where([
            ['user_id', auth()->user()->id],
            ['news_id', $this->id],
        ])->first();
        return (bool)$dislike;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
