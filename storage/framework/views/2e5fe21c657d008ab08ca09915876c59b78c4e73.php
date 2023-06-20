<?php $__env->startSection('title'); ?>
    Сертификат №<?php echo e($app->id); ?> — Управление сертификатами
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <h2><a href="<?php echo e(url('admin/member')); ?>">Список гостей и участников</a> / <span class="regular_h">Сертификат №<?php echo e($app->id); ?> - <?php echo e($app->name); ?></span></h2>
        <div class="app_info info_block admin_app_info">
        <img src="<?php echo e(asset('storage/certificate/'.$app->certificate)); ?>" alt="Сертификат отсутствует"  style="width: 400px">
        </div>
        <form action="<?php echo e(url('admin/certificate_update/{id}')); ?>" method="post" class="admin_form app_form">
            <?php echo csrf_field(); ?>
            <input type="file" name="certificate" id="certificate">
          
            <button type="submit" class="form_btn btn">Изменить сертификат</button>
         
        </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/admin/certificate.blade.php ENDPATH**/ ?>