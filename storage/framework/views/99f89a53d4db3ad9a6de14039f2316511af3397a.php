<?php $__env->startSection('title'); ?>
    Фестивали
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
    Все фестивали "Калейдоскоп педагогических технологий". Архив фестивалей. Примите участие в текущаем фестивале.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
    Фестивали, архив фестивалей, актуальный фестиваль
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Главный фестиваль</h2>
    <?php if($festivals != null): ?>
        <a href="<?php echo e(url('festivals/'.$actual_festival->id)); ?>">
            <div class="actual_festival">
                <div class="festival">
                    <div class="festival_top">
                        <div class="festival_name">
                            <h3><?php echo e($actual_festival->name); ?></h3>
                            <span>(<?php if(isset($actual_festival->start)): ?><?php echo e(date("d.m.Y", strtotime($actual_festival->start))); ?> <?php else: ?>??? <?php endif; ?> — <?php if(isset($actual_festival->end)): ?> <?php echo e(date("d.m.Y", strtotime($actual_festival->end))); ?><?php else: ?> ???<?php endif; ?>)</span>
                        </div>
                        <div class="festival_actions">
                            <?php if($actual_festival->start != null && $actual_festival->end != null): ?>
                                <?php
                                    $now = time();
                                    $end_time = strtotime($actual_festival->end) - $now;
                                    $end = ceil($end_time / 60 / 60 / 24);
                                    $diff = '';
                                    if ($end < 0) {
                                        $diff = 'Завершен';
                                    }else {
                                        if ($end == 0) {
                                            $diff = "Заканчивается сегодня";
                                        }elseif ($end == 1) {
                                            $diff = "Заканчивается через $end день";
                                        }elseif ($end > 1 && $end < 5) {
                                            $diff = "Заканчивается через $end дня";
                                        }else {
                                            $diff = "Заканчивается через $end дней";
                                        }
                                    }
                                ?>
                                <span><?php echo e($diff); ?></span>
                            <?php else: ?>
                                <span>Срок неопределен</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                        $count = 0;
                        foreach ($actual_festival->applications as $app) {
                            if ($app->app_status_id == 2 && $app->member_status_id != 1) {
                                $count++;
                            }
                        }
                    ?>
                    <span class="festival_count">Участников: <?php echo e($count); ?></span>
                    <div class="festival_info info_block">
                        <p><?php echo e($data['short']); ?></p>
                    </div>
                </div>
            </div>
        </a>
        <?php if(count($festivals) > 0): ?>
            <h2>Архив фестивалей</h2>
            <?php $__currentLoopData = $festivals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $festival): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url('festivals/'.$festival->id)); ?>">
                    <div class="actual_festival archive_festivals">
                        <div class="festival">
                            <div class="festival_top">
                                <div class="festival_name">
                                    <h3><?php echo e($festival->name); ?></h3>
                                    <span>(<?php if(isset($festival->start)): ?><?php echo e(date("d.m.Y", strtotime($festival->start))); ?> <?php else: ?>??? <?php endif; ?> — <?php if(isset($festival->end)): ?> <?php echo e(date("d.m.Y", strtotime($festival->end))); ?><?php else: ?> ???<?php endif; ?>)</span>
                                </div>
                                <div class="festival_actions">
                                    <?php if($festival->start != null && $festival->end != null): ?>
                                        <?php
                                            $now = time();
                                            $end_time = strtotime($festival->end) - $now;
                                            $end = ceil($end_time / 60 / 60 / 24);
                                            $diff = '';
                                            if ($end < 0) {
                                                $diff = 'Завершен';
                                            }else {
                                                if ($end == 0) {
                                                    $diff = "Заканчивается сегодня";
                                                }elseif ($end == 1) {
                                                    $diff = "Заканчивается через $end день";
                                                }elseif ($end > 1 && $end < 5) {
                                                    $diff = "Заканчивается через $end дня";
                                                }else {
                                                    $diff = "Заканчивается через $end дней";
                                                }
                                            }
                                        ?>
                                        <span><?php echo e($diff); ?></span>
                                    <?php else: ?>
                                        <span>Срок неопределен</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <span class="festival_count">Участников: <?php echo e(count($festival->applications)); ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php else: ?>
        Список фестивалей пуст
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\localhost\festival\resources\views/festivals.blade.php ENDPATH**/ ?>