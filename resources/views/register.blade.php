@extends('layouts.base')
@section('title', 'Регистрация')

@section('content')
<div class="container single-card">
    <div class="form-card" style="margin-top: 150px">
        <form action="{{ route('register') }}" method="POST">
            @CSRF
            <h1>Регистрация</h1>
    
            <div class="form-input">
                <input name="name" id="nickname" type="text" required placeholder=" ">
                <label for="nickname>">Никнейм</label>
            </div>
            @error('name')
                <div class="error-message">
                    {{ $message }}
                </div>
            @enderror
    
            <div class="form-input">
                <input name="password" id="password" type="password" required>
                <label for="password">Пароль</label>
            </div>
            @error('password')
                <div class="error-message">
                    {{ $message }}
                </div>
            @enderror
    
            <div class="form-checkbox">
                <input name="agreement" id="checkbox" type="checkbox" required>
                <label for="checkbox">Я пидорас</label>
            </div>
            @error('agreement')
                <div class="error-message">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</div>
@endsection