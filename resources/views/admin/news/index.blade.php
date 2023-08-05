@extends('layouts.admin')
@section('title', 'Новости')
@section('info', 'Что у вас нового?')

@section('content')
    <a class="button" href="{{ route('admin.news.create') }}">Добавить новость</a>
    <h2 class="admin-all-title">Все новости:</h2>
    @if(count($news) > 0)
        <div class="item-list">
            @foreach ($news as $item)
                <a style="margin-top: 5px; display:block; margin-bottom: 15px;" href="{{ route('admin.news.edit', $item->id) }}">{{ $item->id }}. {{ $item->title }}
                    <br> {{ $item->content }}
                </a>
            @endforeach

        </div>
    @else
        <p style="margin-top: 10px">Новостей пока нет...</p>
    @endif
@endsection
