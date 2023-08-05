@extends('layouts.base')
@section('title', 'Cart')

@section('content')
<div class="container">
    <h2 class="admin-all-title" style="margin-bottom: 20px;">Cart</h2>
    @foreach($cart as $product)
        <div style="display: flex; flex-direction: row">
            <p>{{ $product->product->title }}, {{ $product->product->price }} | Количество: {{$product->quantity}} | </p>
            <form action="{{ route('cart.add', $product->product->id) }}" method="POST">
                @csrf
                <button type="submit" class="ceil__button">
                    <svg xmlns="http://www.w3.org/2000/svg" width=20 height=20 fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </form>
            <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="ceil__button">
                    <svg xmlns="http://www.w3.org/2000/svg" width=20 height=20 fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </form>
        </div>
    @endforeach
    @if(count($cart) > 0)
        <form action="{{ route('cart.clear') }}" method="post">
            @csrf
            <button class="button" style="margin-top: 10px;">Очистить корзину</button>
        </form>
        <h2 style="margin-top: 50px">Total: {{ App\Models\Cart::total() }} руб.</h2>
    @else
        <p>Ваша корзина пуста, вы ебаный нищеброд!<br>Быстрее бегите закупаться нашими охуенными товарами в <a href="{{ route('market.index') }}" style="text-decoration: underline; color: greenyellow">магазин</a></p>
    @endif
</div>
@endsection
