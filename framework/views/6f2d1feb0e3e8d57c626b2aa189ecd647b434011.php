<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>"/>
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>"/>
    <link type="image/png" sizes="32x32" rel="icon" href="<?php echo e(asset('img/favicon-32x32.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/media.css')); ?>">
    <script src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <title><?php echo $__env->yieldContent('title'); ?></title>
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
                <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>" alt="Логотип"></a>
                <h1>Фестиваль "Калейдоскоп педагогических технологий"</h1>
            </div>
            <a href="<?php echo e(url('account')); ?>" class="header_link">
                <?php if(auth()->guard()->check()): ?>
                    Личный кабинет
                <?php else: ?>
                    Войти
                <?php endif; ?>
            </a>
            <div class="burger_button">
                <span class=""></span>
            </div>
        </header>
        <nav>
            <a href="<?php echo e(url('account')); ?>" class="header_link burger_link">
                <?php if(auth()->guard()->check()): ?>
                    Личный кабинет
                <?php else: ?>
                    Войти
                <?php endif; ?>
            </a>
            <a href="<?php echo e(url('/')); ?>">О фестивале</a>
            <a href="<?php echo e(url('registration')); ?>">Регистрация участников</a>
            <a href="<?php echo e(url('festivals')); ?>">Фестивали</a>
            <a href="<?php echo e(url('help')); ?>">Помощь</a>
            <a href="<?php echo e(url('members')); ?>">Участники и гости</a>
            <div class="sp_link">
                <a href="<?php echo e(url('sitemap')); ?>" class="burger_link">Карта сайта</a>
            </div>
        </nav>
    </div>
    <main>
        <div class="content_container">
            <div class="content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <footer>
                <span>Пермский авиационный техникум им. А.Д.Швецова, 2015 - 2022</span>
                <div class="footer_links">
                    <a href="<?php echo e(url('sitemap')); ?>">Карта сайта</a>
                </div>
            </footer>
        </div>
    </main>
</body>
</html>
<?php /**PATH W:\domains\localhost\festival\resources\views/layouts/main.blade.php ENDPATH**/ ?>