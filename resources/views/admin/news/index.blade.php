@extends('layouts.private')
@section('title', 'Новости')
@section('info', 'Новости')

@section('content')
    <a class="button" href="{{ route('admin.news.create') }}">Добавить новость</a>
    <div class="item-list">
        @foreach ($news as $item)
            <a style="margin-top: 5px; display:block" href="{{ route('admin.news.edit', $item->id) }}">{{ $item->id }}
                . {{ $item->title }}</a>
        @endforeach
    </div>
@endsection
