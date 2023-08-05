@extends('layouts.admin')
@section('title', 'Написать новость')

@section('info', 'Написать новость')

@section('content')
    <form action="{{ route('admin.news.store') }}" class="input-list" method="POST">
        @csrf
        <div class="input-item">
            <label for="title" class="input-label">Название</label>
            <input type="text" class="input" id="title" value="{{ old('title') }}" name="title">
            @error('title')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="content" class="input-label">Описание</label>
            <textarea rows="6" class="input" id="content" name="content">{{ old('desc') }}</textarea>
            @error('content')
            <div class="error">{{  $message }}</div>
            @enderror
            <button class="button" type="submit" style="margin: 10px 0">Сохранить</button>
            <a class="button" href="{{ route('admin.news') }}">Назад</a>
        </div>
    </form>
@endsection
