<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'product_id',
        'price',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function getCount() {
        return count(self::query()->where('session_id', session()->getId())->get());
    }

    public static function total() {
        $cart = Cart::query()->where('session_id', session()->getId())->get();
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }

}
