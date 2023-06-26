@extends('layouts.private')
@section('title', 'Редактировать товар')

@section('content')
    <form action="{{ route('admin.products.update', $product->id) }}" class="input-list" method="POST">
        @csrf
        @method('PATCH')
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
            <input class="input" value="{{ \Illuminate\Support\Carbon::parse($product->publishDate)->format('Y-m-d') }}"
                   id="publishDate" name="publishDate" type="date">
            @error('publishDate')
            <div class="error">{{  $message }}</div>
            @enderror
        </div>
        <button class="button" type="submit">Сохранить</button>
    </form>
    <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="input-list"
          style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button class="button" type="submit">Удалить</button>
    </form>
@endsection
