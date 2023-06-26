@extends('layouts.base')
{{-- @section('title', {{ $product->title }}) --}}

@section('content')
    <div class="container" style="margin-top: 150px;">
        <div class="product__inner">
            <div class="product__image">
                <img src="{{ asset('storage/images/temp500.png') }}">
            </div>
            <div class="product__info">
                <h2 class="product__title">Футболка "Грязные животные"</h2>
                <p class="product__price">2 999 рублей</p>
                <p class="product__desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. A deleniti fuga nesciunt quod quasi natus voluptatem, ex esse sed, debitis fugiat ipsum amet dolorum et soluta iusto reprehenderit libero quia?</p>
            </div>
        </div>
    </div>
@endsection