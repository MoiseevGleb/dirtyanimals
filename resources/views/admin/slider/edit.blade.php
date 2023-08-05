@extends('layouts.admin')
@section('title', "Редактировать слайд")
@section('info', "Редактировать слайд")

@section('content')
    <img alt="slider_img" src="{{ asset('/storage/images/slider/' . $image) }}" style="height: 400px; width: 600px; border: 1px solid black">
    <form action="{{ route('admin.slider.update', $image) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input name="slide" type="file" class="input-file"><br>
        @error('slide')
            <p class="error-message">{{ $message }}</p>
        @enderror
        <button class="button" type="submit" style="display: inline-block; font-size: 16px; font-family: 'Roboto', sans-serif">Сохранить</button>
        <a class="button" href="{{ route('admin.slider') }}" style="display: inline-block;">Назад</a>
    </form>
@endsection
