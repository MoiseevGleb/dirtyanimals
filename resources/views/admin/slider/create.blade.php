@extends('layouts.admin')
@section('title', "Создать слайд")
@section('info', "Создать слайд")

@section('content')
    <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input name="slide" type="file" class="input-file"><br>
        @error('slide')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <button class="button" type="submit" style="display: inline-block; font-size: 16px; font-family: 'Roboto', sans-serif">Сохранить</button>
        <a class="button" href="{{ route('admin.slider') }}" style="display: inline-block;">Назад</a>
    </form>
@endsection
