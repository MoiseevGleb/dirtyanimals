<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'price',
        'publishDate',
        'isPublished',
        'image',
    ];

    protected $casts = [
        'publishDate' => 'datetime:Y-m-d H:i:s',
        'isPublished' => 'boolean',
    ];

    public function setPublishDateAttribute($value)
    {
        $this->attributes['publishDate'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getPublishDateAttribute($value)
    {
        if ($this->attributes['publishDate'] !== null)
            return Carbon::parse($value)->format('Y-m-d\TH:i');
        else return "";
    }
}
