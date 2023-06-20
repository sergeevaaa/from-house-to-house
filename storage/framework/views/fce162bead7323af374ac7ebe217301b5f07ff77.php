<?php $__env->startSection('title'); ?>
    Карта сайта
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Карта сайта</h2>
    <div class="sitemap_block">
        <div class="sitemap">
            <p class="bold_text">Фестиваль "Калейдоскоп педагогических технологий"</p>
            <div class="links_container main_container">
                <span><a href="<?php echo e(url('/')); ?>">О фестивале</a></span>
                <span><a href="<?php echo e(url('registration')); ?>">Регистрация участников</a></span>
                <span><a href="<?php echo e(url('help')); ?>">Помощь</a></span>
                <span><a href="<?php echo e(url('members')); ?>">Участники и гости</a></span>
                <span><a href="<?php echo e(url('account')); ?>">Личный кабинет</a></span>
                <span class="open_link"><button class="btn image_btn map_btn" id="link_0"><img src="<?php echo e(asset('img/icons/add.png')); ?>" alt="+"></button><a href="<?php echo e(url('festivals')); ?>">Фестивали</a></span>
                <div class="links_container" id="container_link_0">
                    <?php $__currentLoopData = $festivals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $festival): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($festival->technologies) > 0): ?>
                            <span class="open_link"><button class="btn image_btn map_btn" id="link_<?php echo e($festival->id); ?>"><img src="<?php echo e(asset('img/icons/add.png')); ?>" alt="+"></button><a href="<?php echo e(url('festivals/'.$festival->id)); ?>"><?php echo e($festival->name); ?></a></span>
                            <div class="links_container" id="container_link_<?php echo e($festival->id); ?>">
                                <?php $__currentLoopData = $festival->technologies->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $count = 0;
                                        foreach ($technology->applications as $app) {
                                            if ($app->festival_id == $festival->id && $app->app_status->id == 2) {
                                                $count++;
                                            }
                                        }
                                    ?>
                                    <?php if(count($technology->applications) > 0 && $count > 0): ?>
                                        <span class="open_link"><button class="btn image_btn map_btn" id="link_<?php echo e($technology->id); ?>"><img src="<?php echo e(asset('img/icons/add.png')); ?>" alt="+"></button><a href="<?php echo e(url('festivals/'.$festival->id)); ?>"><?php echo e($technology->name); ?></a></span>
                                        <div class="links_container" id="container_link_<?php echo e($technology->id); ?>">
                                            <?php $__currentLoopData = $technology->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($app->festival_id == $festival->id): ?>
                                                    <span class="blue_text">- <a href="<?php echo e(url('application/'.$app->id)); ?>"><?php echo e($app->name); ?></a></span>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php else: ?>
                                        <span>- <a href="<?php echo e(url('festivals/'.$festival->id)); ?>"><?php echo e($technology->name); ?></a></span>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $count = 0;
                                    foreach ($festival->applications as $app) {
                                        if ($app->technology != null) {
                                            $count++;
                                        }
                                    }
                                ?>
                                <?php if($count > 0): ?>
                                    <span class="open_link"><button class="btn image_btn map_btn" id="link_00"><img src="<?php echo e(asset('img/icons/add.png')); ?>" alt="+"></button><a href="<?php echo e(url('festivals/'.$festival->id)); ?>">Другое</a></span>
                                    <div class="links_container" id="container_link_00">
                                        <?php $__currentLoopData = $festival->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($app->technology != null && $app->app_status_id == 2): ?>
                                                <span class="blue_text">- <a href="<?php echo e(url('application/'.$app->id)); ?>"><?php echo e($app->name); ?></a></span>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <span>- <a href="<?php echo e(url('festivals/'.$festival->id)); ?>"><?php echo e($festival->name); ?></a></span>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/sitemap.blade.php ENDPATH**/ ?>