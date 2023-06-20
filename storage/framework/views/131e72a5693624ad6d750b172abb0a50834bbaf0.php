<?php $__env->startSection('title'); ?>
    Заявка №<?php echo e($app->id); ?> — Управление завявками
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <h2><a href="<?php echo e(url('admin/applications')); ?>">Управление заявками</a> / <span class="regular_h">Заявка №<?php echo e($app->id); ?> - <?php echo e($app->name); ?></span></h2>
        <div class="app_info info_block admin_app_info">
            <p><b>Статус:</b> <?php echo e($app->member_status->name); ?></p>
            <?php if(isset($app->technology_selected)): ?>
                <p><b>Технология:</b> <?php echo e($app->technology_selected->name); ?></p>
            <?php else: ?>
                <p><b>Технология:</b> <?php echo e($app->technology); ?></p>
            <?php endif; ?>
            <p><b>Организация:</b> <?php echo e($app->organization); ?></p>
            <p><b>Дата подачи заявки:</b> <?php echo e($app->created_at); ?></p>
            <p><b>Ссылка:</b> <a href="<?php echo e($app->video); ?>" target="_blank" class="text_mail">Смотреть</a> ( <?php echo e($app->video); ?> )</p>
        </div>
        <form action="" method="post" class="admin_form app_form">
            <?php echo csrf_field(); ?>
            <textarea name="note" id="" rows="5" placeholder="Добавить замечание..."><?php echo e($app->note); ?></textarea>
            <div class="select_button_block">
                <select name="status" id="app_status_select">
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($status->id); ?>" <?php if($status->id == $app->app_status_id): ?> selected <?php endif; ?>><?php echo e($status->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="form_btn btn">Изменить статус</button>
            </div>
        </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/admin/application.blade.php ENDPATH**/ ?>