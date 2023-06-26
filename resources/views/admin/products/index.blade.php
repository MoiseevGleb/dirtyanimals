@extends('layouts.private')
@section('title', 'Товары')

@section('info', 'Товары') 

@section('content')
    <a class="button" href="{{ route('admin.products.create') }}">Добавить товар</a>
    <div class="item-list">
        @foreach ($products as $product)
            <a style="margin-top: 5px; display:block" href="{{ route('admin.products.edit', $product->id) }}">{{ $product->id }}. {{ $product->title }}</a>
        @endforeach
    </div>
@endsection