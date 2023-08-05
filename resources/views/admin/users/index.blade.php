@extends('layouts.admin')
@section('title', 'Пользователи')

@section('info', 'Пользователи')

@section('content')
    <table class="table">
        <th>Никнейм</th>
        <th>Дата регистрации</th>
        <th>Статус админа</th>

        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->created_at->translatedFormat('d F Y года, G:i') }}</td>
                <td>
                    <div class="flex-ceil">
                        <div class="table__left">
                            {{ $user->isAdmin ? 'Активен' : 'Отсутствует' }}
                        </div>
                        <div class="right">
                            @if ($user->isAdmin)
                                <form action="{{ route('admin.unsetAdmin', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="ceil__button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width=20 height=20 fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{  route('admin.setAdmin', $user->id)  }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="ceil__button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width=20 height=20 fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
