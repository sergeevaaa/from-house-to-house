<?php $__env->startSection('title'); ?>
    <?php echo e($festival->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2><?php echo e($festival->name); ?></h2>
    <span> Дата проведения: <?php if(isset($festival->start)): ?><?php echo e(date("d.m.Y", strtotime($festival->start))); ?> <?php else: ?>??? <?php endif; ?> — <?php if(isset($festival->end)): ?> <?php echo e(date("d.m.Y", strtotime($festival->end))); ?><?php else: ?> ???<?php endif; ?></span>
    <p class="all_link"><a href="<?php echo e(url('festivals/'.$festival->id.'/applications')); ?>">Список всех участников</a></p>
    <div class="festival_technologies_block">
        <div class="festival_technologies">
            <div class="festival_technology_block">
                <div class="festival_technology">
                    <?php
                        $count = 0;
                        foreach($festival->applications as $app) {
                            if($app->technology_id == null && $app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена' && $app->member_status_id != 1) {
                                $count++;
                            }
                        }
                    ?>
                    <span>Другое <?php if($count > 0): ?><span class="bold_text">(<?php echo e($count); ?>)</span><?php endif; ?></span>
                    <?php if($count > 0): ?><img src="<?php echo e(asset('img/icons/arrow-down.png')); ?>" alt="arrow_down"><?php endif; ?>
                </div>
                <div class="festival_apps">
                    <?php $__currentLoopData = $festival->applications->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($app->technology_id == null && $app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена' && $app->member_status_id != 1): ?>
                            <div><a href="<?php echo e(url('application/'.$app->id)); ?>"><?php echo e($app->name); ?></a></div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php $__currentLoopData = $festival->technologies->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="festival_technologies">
                <div class="festival_technology_block">
                    <div class="festival_technology">
                        <?php
                            $count = 0;
                            foreach($festival->applications as $app) {
                                if($app->technology_id == $technology->id && $app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена' && $app->member_status_id != 1) {
                                    $count++;
                                }
                            }
                        ?>
                        <span><?php echo e($technology->name); ?> <?php if($count > 0): ?><span class="bold_text">(<?php echo e($count); ?>)</span><?php endif; ?></span>
                        <?php if($count > 0): ?><img src="<?php echo e(asset('img/icons/arrow-down.png')); ?>" alt="arrow_down"><?php endif; ?>
                    </div>
                    <div class="festival_apps">
                        <?php $__currentLoopData = $festival->applications->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($app->technology_id == $technology->id && $app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена' && $app->member_status_id != 1): ?>
                                <div><a href="<?php echo e(url('application/'.$app->id)); ?>"><?php echo e($app->name); ?></a></div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/festival.blade.php ENDPATH**/ ?>