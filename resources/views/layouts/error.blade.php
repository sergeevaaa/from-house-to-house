<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image/png" sizes="32x32" rel="icon" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="stylesheet" href="{{asset('css/error.css')}}">
    <title>@yield('title')</title>
</head>
<body>
<main>
    <div class="error_container">
        <div class="error_block">
            @yield('content')
        </div>
    </div>
    <div class="logo_container">
        <a href="{{url('/')}}"><img src="{{asset('img/logo.svg')}}" alt="логотип"></a>
    </div>
</main>
</body>
</html>
