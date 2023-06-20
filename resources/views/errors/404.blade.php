@extends('layouts.error')

@section('title')
    404 | Not Found
@endsection

@section('content')
    <h2><span>404</span> Страница не найдена</h2>
    <div class="error_info">
        <span>Упс... Кажется такой страницы нет на нашем сайте :(</span>
        <p>Возможно, вы ввели неверный адрес или страница была удалена</p>
    </div>
    <div class="return">
        <a href="{{url('/')}}" class="return_btn btn">Вернуться на главную</a>
    </div>
@endsection
