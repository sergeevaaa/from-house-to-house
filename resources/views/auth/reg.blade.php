@extends('layouts.auth')

@section('title')
    Регистрация
@endsection

@section('form')
    <div class="auth_head">
        <a href="{{url('auth')}}" class="{{ request()->is('auth') ? 'active' : null }}"><h2>Авторизация</h2></a>
        <a href="{{url('reg')}}" class="{{ request()->is('reg') ? 'active' : null }}"><h2>Регистрация</h2></a>
    </div>
    <form action="" class="auth_form" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit" class="form_btn btn">Зарегистрироваться</button>
    </form>
    <p class="errors">
        @error('email')
            {{ $message }}
        @enderror
        @isset($error)
            {{$error}}
        @endisset
    </p>
@endsection
