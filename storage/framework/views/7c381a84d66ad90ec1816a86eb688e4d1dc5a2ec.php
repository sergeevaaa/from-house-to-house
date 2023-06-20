<?php $__env->startSection('title'); ?>
    Восстановление пароля
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
    <div class="success">
        <h3>Вы успешно восстановили свой пароль!</h3>
        <br>
        <p><?php echo e($email); ?></p>
        <br>
        <div class="info">
            <p>Мы отправили на вашу почту новое письмо с паролем.</p>
            <p>Теперь вы можете пройти <a href="<?php echo e(url('auth')); ?>">Авторизацию</a> или вернуться на <a href="<?php echo e(url('/')); ?>">главную страницу</a>.</p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/auth/successReset.blade.php ENDPATH**/ ?>