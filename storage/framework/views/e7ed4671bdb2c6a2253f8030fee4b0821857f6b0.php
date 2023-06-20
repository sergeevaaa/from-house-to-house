<?php $__env->startSection('title'); ?>
    Регистрация
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
    <div class="success">
        <h3>Вы успешно зарегистрировались!</h3>
        <br>
        <p><?php echo e($email); ?></p>
        <br>
        <div class="info">
            <p>Данные для входа были отправлены на указанный вами адрес электронной почты.</p>
            <p>Теперь вы можете пройти <a href="<?php echo e(url('auth')); ?>">Авторизацию</a> или вернуться на <a href="<?php echo e(url('/')); ?>">главную страницу</a>.</p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\localhost\festival\resources\views/auth/success.blade.php ENDPATH**/ ?>