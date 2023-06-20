<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image/png" sizes="32x32" rel="icon" href="<?php echo e(asset('img/favicon-32x32.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/media.css')); ?>">
    <script src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
<div class="overlay d_none"></div>
<?php if(isset($message)): ?>
    <div class="att_message">
        <span><?php echo e($message); ?></span>
    </div>
<?php endif; ?>
<div class="header_container">
    <header>
        <div class="logo">
            <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>" alt="Логотип"></a>
            <div class="logo_name">
                <h1>Фестиваль "Калейдоскоп педагогических технологий"</h1>
                <h2>Панель администратора</h2>
            </div>
        </div>
        <a href="<?php echo e(url('account')); ?>" class="header_link">Личный кабинет</a>
        <div class="burger_button">
            <span class=""></span>
        </div>
    </header>
    <nav>
        <a href="<?php echo e(url('account')); ?>" class="header_link burger_link">Личный кабинет</a>
        <a href="<?php echo e(url('admin/festivals')); ?>">Фестивали</a>
        <a href="<?php echo e(url('admin/technologies')); ?>">Технологии</a>
        <a href="<?php echo e(url('admin/applications')); ?>">Управление заявками</a>
        <a href="<?php echo e(url('admin/comments')); ?>">Комментарии</a>
        <div class="sp_link">
            <a href="" class="burger_link">Карта сайта</a>
        </div>
    </nav>
</div>
<main>
    <div class="content_container">
        <div class="content admin_content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</main>
</body>
</html>
<?php /**PATH W:\domains\localhost\festival\resources\views/layouts/admin.blade.php ENDPATH**/ ?>