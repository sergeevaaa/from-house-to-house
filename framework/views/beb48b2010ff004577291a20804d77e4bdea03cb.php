<?php $__env->startSection('title'); ?>
    Регистрация
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
    <div class="auth_head">
        <a href="<?php echo e(url('auth')); ?>" class="<?php echo e(request()->is('auth') ? 'active' : null); ?>"><h2>Авторизация</h2></a>
        <a href="<?php echo e(url('reg')); ?>" class="<?php echo e(request()->is('reg') ? 'active' : null); ?>"><h2>Регистрация</h2></a>
    </div>
    <form action="" class="auth_form" method="post">
        <?php echo csrf_field(); ?>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit" class="form_btn btn">Зарегистрироваться</button>
    </form>
    <p class="errors">
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <?php echo e($message); ?>

        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php if(isset($error)): ?>
            <?php echo e($error); ?>

        <?php endif; ?>
    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\localhost\festival\resources\views/auth/reg.blade.php ENDPATH**/ ?>