@extends('layouts.base')
@section('title', 'Войти')

@section('content')
<div class="container single-card">
    <div class="form-card" style="margin-top: 150px;">
        <form action="{{ route('login') }}" method="POST">
            @CSRF
            <h1>Вход</h1>
    
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
    
            <button type="submit" style="margin-top: 30px">Войти</button>
    
            <div class="forget">
                <p><a href="">Забыл пароль?</a>  Иди нахуй!</p>
            </div>
        </form>
    </div>
</div>
@endsection