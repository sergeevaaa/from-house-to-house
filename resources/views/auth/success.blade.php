@extends('layouts.auth')

@section('title')
    Регистрация
@endsection

@section('form')
    <div class="success">
        <h3>Вы успешно зарегистрировались!</h3>
        <br>
        <p>{{$email}}</p>
        <br>
        <div class="info">
            <p>Данные для входа были отправлены на указанный вами адрес электронной почты.</p>
            <p>Теперь вы можете пройти <a href="{{url('auth')}}">Авторизацию</a> или вернуться на <a href="{{url('/')}}">главную страницу</a>.</p>
        </div>
    </div>
@endsection
