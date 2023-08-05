@extends('layouts.admin')
@section('title', 'Создать товар')

@section('info', 'Создать новый товар')

@section('content')
    <form action="{{ route('admin.products.store') }}" class="input-list" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-item">
            <label for="image">Картинка</label>
            <input id="image" type="file" name="image" class="input-file" style="margin: 0;" value="{{ old('image') }}">
            @error('image')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
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
            <input type="checkbox" value="1" id="isPublished" name="isPublished" {{ old('isPublished') == '1' ? 'checked' : '' }}>
            @error('isPublished')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="publishDate" class="input-label">Дата и время публикации</label>
            <input class="input" value="{{ old('publishDate') }}" id="publishDate" name="publishDate" type="datetime-local">
            @error('publishDate')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div>
            <button class="button" type="submit" style="display: inline-block; font-size: 16px; font-family: 'Roboto', sans-serif">Сохранить</button>
            <a class="button" href="{{ route('admin.products') }}" style="display: inline-block">Назад</a>
        </div>
    </form>
@endsection
