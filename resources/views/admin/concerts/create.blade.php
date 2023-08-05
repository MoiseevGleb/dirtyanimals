@extends('layouts.admin')
@section('title', 'Создать концерт')

@section('info', 'Создать концерт')

@section('content')
    <form action="{{ route('admin.concerts.store') }}" class="input-list" method="POST">
        @csrf
        <div class="input-item">
            <label for="city" class="input-label">Город</label>
            <input type="text" class="input" id="city" value="{{ old('city') }}" name="city">
            @error('city')
                <div class="error-message">{{  $message }}</div>
            @enderror
        </div>
        <div>
            <button class="button" type="submit" style="display: inline-block; font-size: 16px; font-family: 'Roboto', sans-serif">Сохранить</button>
            <a class="button" href="{{ route('admin.concerts') }}" style="display: inline-block">Назад</a>
        </div>
    </form>
@endsection
