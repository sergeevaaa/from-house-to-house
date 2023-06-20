<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .note {
            font-style: italic;
        }
        .mail {
            color: black;
        }
        img {
            width: 100px;
        }
    </style>
</head>
<body>
<div class="mail">
    @if($status == 'new')
        <p>Вы успешно зарегистрировались на сайте Фестиваля "Калейдоскоп педагогических технологий"!</p>
    @else
        <p>Вы успешно восставновили пароль, старый пароль более не действителен!</p>
    @endif
    <p class="password">Ваш пароль: <span style="font-weight: bold">{{$pass}}</span></p>
    <p class="note">В поле email при авторизации указывайте почту, на которую пришло это письмо.</p>
    <br>
    <p>С уважением, команда Фестиваля</p>
</div>
</body>
</html>
