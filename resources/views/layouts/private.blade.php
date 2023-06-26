<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@if (session('error'))
    <div class="session-error">
        <p>{{ session()->get('error') }}</p>
    </div>
@endif
<div class="wrapper">
    <div class="aside__view">
        <aside class="aside">
            <a href="{{ route('home') }}"><h1 class="aside__title">{{ config('app.name') }}</h1></a>
            <a href="{{ route('admin.index') }}" class="aside__item">Главная</a>
            <a href="{{ route('admin.users') }}" class="aside__item">Пользователи</a>
            <a href="{{ route('admin.products') }}" class="aside__item">Товары</a>
            <a href="{{ route('admin.news') }}" class="aside__item">Новости</a>
            <a href="{{ route('admin.users') }}" class="aside__item">Картинки слайдера</a>
        </aside>

        <div class="private__content">
            <h1 class="private__content-title">Панель Администратора</h1>
            <p class="section__info">@yield('info')</p>
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
