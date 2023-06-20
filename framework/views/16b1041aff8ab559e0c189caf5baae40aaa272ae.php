<?php $__env->startSection('title'); ?>
    500 | Server error
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2><span>500</span> Сервер не отвечает</h2>
    <div class="error_info">
        <span>Упс... Кажется что-то пошло не так :(</span>
        <p>Сервер не смог выполнить ваш запрос, попробуйте позже или свяжитесь с тех. поддрежкой</p>
    </div>
    <div class="return">
        <a href="<?php echo e(url('/')); ?>" class="return_btn btn">Вернуться на главную</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\localhost\festival\resources\views/errors/500.blade.php ENDPATH**/ ?>