@extends('layouts.private')
@section('title', 'Редактировать новость')

@section('content')
    <form action="{{ route('admin.news.update', $news->id) }}" class="input-list" method="POST">
        @csrf
        @method('PATCH')
        <div class="input-item">
            <label for="title" class="input-label">Заголовок</label>
            <input type="text" class="input" id="title" value="{{ $news->title }}" name="title">
            @error('title')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="content" class="input-label">Содержание</label>
            <textarea rows="6" class="input" id="content" name="content">{{ $news->content }}</textarea>
            @error('content')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <button class="button" type="submit">Сохранить</button>
    </form>
    <form action="{{ route('admin.news.delete', $news->id) }}" method="POST" class="input-list" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button class="button" type="submit">Удалить</button>
    </form>
@endsection
