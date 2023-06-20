@extends('layouts.auth')

@section('title')
    Восстановление пароля
@endsection

@section('form')
    <div class="success">
        <h3>Вы успешно восстановили свой пароль!</h3>
        <br>
        <p>{{$email}}</p>
        <br>
        <div class="info">
            <p>Мы отправили на вашу почту новое письмо с паролем.</p>
            <p>Теперь вы можете пройти <a href="{{url('auth')}}">Авторизацию</a> или вернуться на <a href="{{url('/')}}">главную страницу</a>.</p>
        </div>
    </div>
@endsection
