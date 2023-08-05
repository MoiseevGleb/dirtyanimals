@extends('layouts.admin')
@section('title', 'Редактировать концерт')
@section('info', 'Редактировать концерт')

@section('content')
    <form action="{{ route('admin.concerts.update', $concert->id) }}" class="input-list" method="POST" >
        @csrf
        @method('PATCH')
        <div class="input-item">
            <label for="city" class="input-label">Город</label>
            <input type="text" class="input" id="city" value="{{ $concert->city }}" name="city">
            @error('city')
                <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <input type="submit" class="button" value="Изменить" style="display: inline-block">
    </form>
    <form action="{{ route('admin.concerts.delete', $concert->id) }}" method="POST" class="input-list" style="margin: 10px 0;">
        @csrf
        @method('DELETE')
        <button class="button" type="submit" style="font-size: 16px; font-family: 'Roboto', sans-serif">Удалить</button>
    </form>
    <a class="button" href="{{ route('admin.concerts') }}">Назад</a>
@endsection
