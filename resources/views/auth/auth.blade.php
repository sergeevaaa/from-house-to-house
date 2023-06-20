@extends('layouts.auth')

@section('title')
    Авторизация
@endsection

@section('form')
    <div class="auth_head">
        <a href="{{url('auth')}}" class="{{ request()->is('auth') ? 'active' : null }}"><h2>Авторизация</h2></a>
        <a href="{{url('reg')}}" class="{{ request()->is('reg') ? 'active' : null }}"><h2>Регистрация</h2></a>
    </div>
    <form action="{{ route('login') }}" class="auth_form" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required>
        <a href="{{url('auth/reset')}}" class="blue_link">Забыли пароль?</a>
        <button type="submit" class="form_btn btn">Войти</button>
        <p class="errors">
            @error('email')
                {{ $message }}
            @enderror
            @error('password')
                {{ $message }}
            @enderror
        </p>
    </form>
@endsection
