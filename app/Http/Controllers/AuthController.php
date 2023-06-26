<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        if (auth()->check()) {
            return redirect(route('user.index'));
        }
        $data = $request->only('name', 'password');
        if (Auth::attempt($data)) {
            return redirect()->intended(route('user.index'));
        } return redirect(route('login.index'))->withError('Неверный логин или пароль');
    }

    public function logout(){
        auth()->logout();
        return redirect(route('home'));
    }

    public function register(Request $request){
        $data = $request->validate([
            'name' => 'string|required|min:1|max:20',
            'password' => 'string|required|min:6|max:50',
        ]);
        if (User::where('name', $data['name'])->exists()) {
            return redirect(route('register.index'))->withError('Такой пользователь уже существует');
        }
        $user = User::create($data);
        if ($user) {
            auth()->login($user);
            return redirect(route('user.index'));
        } return redirect(route('register.index'))->withError('Произошла ошибка');
    }
}
