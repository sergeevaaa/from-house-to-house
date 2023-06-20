<?php $__env->startSection('title'); ?>
    Восстановление пароля
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
    <div class="auth_head reseat_head">
        <h2>Восстановление пароля</h2>
        <a href="<?php echo e(url('auth')); ?>" class="blue_link reset_back"> < Вернуться </a>
    </div>
    <form action="" class="auth_form" method="post">
        <?php echo csrf_field(); ?>
        <label for="email">Введите ваш Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit" class="form_btn btn">Далее</button>
    </form>
    <p class="errors">
        <?php if(isset($error)): ?>
            <?php echo e($error); ?>

        <?php endif; ?>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/auth/reset.blade.php ENDPATH**/ ?>