@extends('layouts.private')
@section('title', 'Создать товар')

@section('info', 'Создать новый товар')

@section('content')
    <form action="{{ route('admin.products.store') }}" class="input-list" method="POST">
        @csrf
        <div class="input-item">
            <label for="title" class="input-label">Название</label>
            <input type="text" class="input" id="title" value="{{ old('title') }}" name="title">
            @error('title')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="desc" class="input-label">Описание</label>
            <textarea rows="6" class="input" id="desc" name="desc">{{ old('desc') }}</textarea>
            @error('desc')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="price" class="input-label">Цена</label>
            <input class="input" id="price" name="price" value="{{ old('price') }}" type="text">
            @error('price')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-check">
            <label for="isPublished" class="input-label">Опубликовать</label>
            <input type="checkbox" value="1" id="isPublished" name="isPublished">
            @error('isPublished')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="publishDate" class="input-label">Дата публикации</label>
            <input class="input" value="{{ old('publishDate') }}" id="publishDate" name="publishDate" type="date">
            @error('publishDate')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <button class="button" type="submit">Сохранить</button>
    </form>
@endsection
