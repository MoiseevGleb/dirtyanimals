@extends('layouts.base')
@section('title', 'Market')

@section('content')
    @include('includes.slider')
    <div class="container">
        <h1 class="section__header">MARKET</h1>
        <div class="card__list">
            @foreach ($products as $product)
                <div class="card__list-item">
                    <div class="card__img-inner">
                        <img alt="product_img" class="card__img" src="{{ asset('storage/images/products/' . $product->image) }}">
                    </div>
                    <div class="card-content">
                        <h3 class="card__title"><a href="">{{ $product->title }}</a></h3>
                        <p class="card__price">{{ $product->price }} рублей</p>
                    </div>

                    <form action="{{ route('cart.add', $product) }}" method="POST" style="width: 100%;">
                        @csrf
                        <button type="submit" style="width: 100%; background-color: transparent; border: 0;">
                            <div class="to-cart">
                                <svg xmlns="http://www.w3.org/2000/svg" width=20 height=20 viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                </svg>
                                <p>добавить в корзину</p>
                            </div>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
