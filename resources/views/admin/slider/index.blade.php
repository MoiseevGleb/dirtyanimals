@extends('layouts.admin')
@section('title', "Редактировать слайдер")
@section('info', "Редактировать слайдер")

@section('content')
    <a class="button" href="{{ route('admin.slider.create') }}">Добавить слайд</a>
    <h2 class="admin-all-title">Все слайды:</h2>
    @if(count($images) > 0)
        @foreach($images as $k => $image)
            <div class="item-list">
                <p>Слайд №{{$k + 1}}</p><br>
                <img alt="slider_image" src="{{ asset('/storage/images/slider/' . $image) }}" style="height: 400px; width: 600px; border: 1px solid black"><br>
                <form action="{{ route('admin.slider.delete', $image) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('admin.slider.edit', $image) }}" class="button" style="display: inline-block">Изменить</a>
                    <button type="submit" class="button" style="display: inline-block; font-size: 16px; font-family: 'Roboto', sans-serif">Удалить</button>
                </form>
                <hr class="hr">
            </div>
        @endforeach
    @else
        <p style="margin-top: 10px">Слайдов пока нет...</p>
    @endif
@endsection
