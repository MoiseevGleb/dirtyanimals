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
    ];

    protected $casts = [
        'publishDate' => 'datetime:Y-m-d',
        'isPublished' => 'boolean',
    ];

    public function setDateAttribute($value)
    {
        $this->attributes['publishDate'] = Carbon::parse($value)->format('Y-m-d');
    }
}
