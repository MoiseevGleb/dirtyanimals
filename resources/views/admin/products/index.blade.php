@extends('layouts.admin')
@section('title', 'Товары')
@section('info', 'Товары')

@section('content')
    <a class="button" href="{{ route('admin.products.create') }}">Добавить товар</a>
    <h2 class="admin-all-title">Все товары:</h2>
    @if(count($products) > 0)
        <div class="item-list">
            @foreach ($products as $product)
                <a style="margin-top: 5px; display:block"
                   href="{{ route('admin.products.edit', $product->id) }}">{{ $product->id }}. {{ $product->title }}</a>
            @endforeach
        </div>
    @else
        <p style="margin-top: 10px">Товаров пока нет...</p>
    @endif
@endsection
