<?php $__env->startSection('title'); ?>
    <?php echo e($festival->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2><a href="<?php echo e(url('festivals/'.$festival->id)); ?>"><?php echo e($festival->name); ?></a> / <span class="regular_h">Все участники</span></h2>
    <div class="applications_list">
        <?php if(count($apps) > 0): ?>
            <ol class="app_list">
            <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($app->app_status_id == 2): ?>
                    <li><p class="app_link"><a href="<?php echo e(url('application/'.$app->id)); ?>"><?php echo e($app->name); ?></a></p></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        <?php else: ?>
            <p class="app_link">Список участников данного фестиваля пуст.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/applications.blade.php ENDPATH**/ ?>