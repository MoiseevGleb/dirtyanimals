@extends('layouts.admin')
@section('title', 'Редактировать товар')
@section('info', 'Редактировать товар')

@section('content')
    <form action="{{ route('admin.products.update', $product->id) }}" class="input-list" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="input-item">
            <label for="image">Картинка</label>
            <img alt="no image" id="image" src="{{ asset('/storage/images/products/' . $product->image) }}" style="height: 300px; width: 500px; border: 1px solid black">
            <input name="image" type="file" class="input-file" style="margin: 0">
            @error('image')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="title" class="input-label">Название</label>
            <input type="text" class="input" id="title" value="{{ $product->title }}" name="title">
            @error('title')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="desc" class="input-label">Описание</label>
            <textarea rows="6" class="input" id="desc" name="desc">{{ $product->desc }}</textarea>
            @error('desc')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="price" class="input-label">Цена</label>
            <input class="input" id="price" name="price" value="{{ $product->price }}" type="text">
            @error('price')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-check">
            <label for="isPublished" class="input-label">Опубликовать</label>
            <input type="checkbox" {{ $product->isPublished ? 'checked' : '' }} value="1" id="isPublished"
                   name="isPublished">
            @error('isPublished')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <div class="input-item">
            <label for="publishDate" class="input-label">Дата публикации</label>
            <input class="input" value="{{ $product->publishDate }}"
                   id="publishDate" name="publishDate" type="datetime-local">
            @error('publishDate')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <button class="button" type="submit" style="font-size: 16px; font-family: 'Roboto', sans-serif">Сохранить</button>
    </form>
    <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="input-list" style="margin: 10px 0; font-size: 16px; font-family: 'Roboto', sans-serif">
        @csrf
        @method('DELETE')
        <button class="button" type="submit" style="font-size: 16px; font-family: 'Roboto', sans-serif">Удалить</button>
    </form>
    <a class="button" href="{{ route('admin.products') }}">Назад</a>
@endsection
