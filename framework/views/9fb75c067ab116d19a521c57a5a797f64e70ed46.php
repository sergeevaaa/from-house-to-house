<?php $__env->startSection('title'); ?>
    Фестивали — Панель администратора
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Фестивали</h2>
    <a href="<?php echo e(url('admin/about')); ?>" class="blue_link">Информация об актуальном фестивале</a>
    <div class="admin_actions">
        <a href="<?php echo e(url('admin/festival/add')); ?>" class="admin_btn form_btn btn">Добавить фестиваль</a>
        <!--<a href="<?php echo e(url('')); ?>" class="admin_btn green_btn form_btn btn">Экспорт</a>-->
    </div>
    <div class="festivals admin_block">
        <?php $__currentLoopData = $festivals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $festival): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="festival">
                <div class="festival_name">
                    <h3><?php echo e($festival->name); ?></h3>
                    <span>(<?php if(isset($festival->start)): ?><?php echo e($festival->start); ?> <?php else: ?>??? <?php endif; ?> — <?php if(isset($festival->end)): ?> <?php echo e($festival->end); ?><?php else: ?> ???<?php endif; ?>)</span>
                </div>
                <div class="festival_actions">
                    <a href="<?php echo e(url('admin/festival/'.$festival->id)); ?>">Настроить</a>
                    <a href="<?php echo e(url('admin/applications?festival='.$festival->id)); ?>">Управление заявками</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\localhost\festival\resources\views/admin/festivals.blade.php ENDPATH**/ ?>