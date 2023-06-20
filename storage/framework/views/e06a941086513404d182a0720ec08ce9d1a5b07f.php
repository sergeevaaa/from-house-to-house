<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image/png" sizes="32x32" rel="icon" href="<?php echo e(asset('img/favicon-32x32.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/error.css')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
<main>
    <div class="error_container">
        <div class="error_block">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <div class="logo_container">
        <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/logo.svg')); ?>"></a>
    </div>
</main>
</body>
</html>
<?php /**PATH W:\domains\localhost\festival\resources\views/layouts/error.blade.php ENDPATH**/ ?>