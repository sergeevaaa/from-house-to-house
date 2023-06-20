<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image/png" sizes="32x32" rel="icon" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/media.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <title>@yield('title')</title>
</head>
<body>
<div class="overlay d_none"></div>
@isset($message)
    <div class="att_message">
        <span>{{$message}}</span>
    </div>
@endisset
<div class="header_container">
    <header>
        <div class="logo">
            <a href="{{url('/')}}"><img src="{{asset('img/logo.svg')}}" alt="Логотип"></a>
            <div class="logo_name">
                <h1>Фестиваль "Калейдоскоп педагогических технологий"</h1>
                <h2>Панель администратора</h2>
            </div>
        </div>
        <a href="{{url('account')}}" class="header_link">Личный кабинет</a>
        <div class="burger_button">
            <span class=""></span>
        </div>
    </header>
    <nav>
        <a href="{{url('account')}}" class="header_link burger_link">Личный кабинет</a>
        <a href="{{url('admin/festivals')}}">Фестивали</a>
        <a href="{{url('admin/technologies')}}">Технологии</a>
        <a href="{{url('admin/applications')}}">Управление заявками</a>
        <a href="{{url('admin/comments')}}">Комментарии</a>
        <a href="{{url('admin/members')}}">Участники и гости</a>
        <div class="sp_link">
            <a href="" class="burger_link">Карта сайта</a>
        </div>
    </nav>
</div>
<main>
    <div class="content_container">
        <div class="content admin_content">
            @yield('content')
        </div>
    </div>
</main>
</body>
</html>
