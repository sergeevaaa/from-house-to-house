<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" content="@yield('keywords')"/>
    <link type="image/png" sizes="32x32" rel="icon" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/media.css')}}">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="overlay d_none"></div>
    <dialog class="d_none">
        <h2>Вы уверены?</h2>
        <p>Вы действительно хотите выполнить это действие?</p>
        <div class="dialog_buttons">
            <button class="btn form_btn dialog_accept_btn">Да</button>
            <button class="btn dialog_cancel_btn">Отмена</button>
        </div>
    </dialog>
    <div class="header_container">
        <header>
            <div class="logo">
                <a href="{{url('/')}}"><img src="{{asset('img/logo.svg')}}" alt="Логотип"></a>
                <h1>Фестиваль "Калейдоскоп педагогических технологий"</h1>
            </div>
            <div href="{{url('account')}}">
                @auth
                   <a  href="{{url('account')}}" class="header_link">Личный кабинет</a> 
                @else
                
                <a href="{{url('reg')}}" class="header_link">Регистрация</a>            
                <a href="{{url('auth')}}" class="header_link">Вход</a>
                @endauth
            </div>
            <div class="burger_button">
                <span class=""></span>
            </div>
        </header>
        <nav>
            <a href="{{url('account')}}" class=" burger_link">
                @auth

                <a href="{{url('account')}}" class=" burger_link">Личный кабинет</a>
                @else
                <a href="{{url('auth')}}" class=" burger_link">Войти</a>
                @endauth
            </a>
            <a href="{{url('/')}}">О фестивале</a>
            @auth
            <a href="{{url('registration')}}">Регистрация участников</a>
            @endauth

            <a href="{{url('festivals')}}">Фестивали</a>
            <a href="{{url('help')}}">Помощь</a>
            <a href="{{url('members')}}">Участники и гости</a>
            <div class="sp_link">
                <a href="{{url('sitemap')}}" class="burger_link">Карта сайта</a>
            </div>
        </nav>
    </div>
    <main>
        <div class="content_container">
            <div class="content">
                @yield('content')
            </div>
            <footer>
                <span>Пермский авиационный техникум им. А.Д.Швецова, 2015 - 2023</span>
                <div class="footer_links">
                    <a href="{{url('sitemap')}}">Карта сайта</a>
                </div>
            </footer>
        </div>
    </main>
</body>
</html>
