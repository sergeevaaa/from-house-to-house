@extends('layouts.error')

@section('title')
    500 | Server error
@endsection

@section('content')
    <h2><span>500</span> Сервер не отвечает</h2>
    <div class="error_info">
        <span>Упс... Кажется что-то пошло не так :(</span>
        <p>Сервер не смог выполнить ваш запрос, попробуйте позже или свяжитесь с тех. поддрежкой</p>
    </div>
    <div class="return">
        <a href="{{url('/')}}" class="return_btn btn">Вернуться на главную</a>
    </div>
@endsection
