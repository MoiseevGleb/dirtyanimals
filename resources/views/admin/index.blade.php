@extends('layouts.admin')
@section('title', 'Панель Администратора')

@section('info')
    Здравствуйте, {{ auth()->user()->name }}
@endsection

@section('content')

@endsection
