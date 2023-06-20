@extends('layouts.auth')

@section('title')
    Восстановление пароля
@endsection

@section('form')
    <div class="auth_head reseat_head">
        <h2>Восстановление пароля</h2>
        <a href="{{url('auth')}}" class="blue_link reset_back"> < Вернуться </a>
    </div>
    <form action="" class="auth_form" method="post">
        @csrf
        <label for="email">Введите ваш Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit" class="form_btn btn">Далее</button>
    </form>
    <p class="errors">
        @isset($error)
            {{$error}}
        @endisset
    </p>
@endsection
