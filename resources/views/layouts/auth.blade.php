<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image/png" sizes="32x32" rel="icon" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <main>
        <div>
            <div class="logo">
                <a href="{{url('/')}}"><img src="{{asset('img/logo.svg')}}" alt="Логотип"></a>
                <h1>Фестиваль "Калейдоскоп педагогических технологий"</h1>
            </div>
            <div class="auth_container">
                @yield('form')
            </div>
        </div>
        <footer>
            <span>Пермский авиационный техникум им. А.Д.Швецова, 2015 - 2022</span>
        </footer>
    </main>
</body>
</html>
