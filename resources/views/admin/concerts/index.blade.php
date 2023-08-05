@extends('layouts.admin')
@section('title', 'Концерты')
@section('info', 'Концерты')

@section('content')
    <a class="button" href="{{ route('admin.concerts.create') }}">Добавить город</a>
    <h2 class="admin-all-title">Все концерты:</h2>

    @if(count($concerts) > 0)
        <div class="item-list">
            @foreach($concerts as $concert)
                <a style="margin-top: 5px;" href="{{ route('admin.concerts.show', $concert->id) }}" >{{ $concert->id }}. {{ $concert->city }}</a><br>
            @endforeach
        </div>
    @else
        <p>У вас нет концертов</p>
    @endif
@endsection
