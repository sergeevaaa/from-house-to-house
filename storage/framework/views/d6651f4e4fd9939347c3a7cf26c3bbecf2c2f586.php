<?php $__env->startSection('description'); ?>
    Список участников и гостей фестиваля педагогических технологий. Оставляйте свои комментарии и получайте сертификат.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
    Участники фестиваля, гости фестиваля
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Участники и гости — Фестиваль
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Участники и гости</h2>
    <div class="members_block">
        <div class="members_nav">
            <button id="members_button" class="btn members_button active">Участники</button>
            <button id="guests_button" class="btn members_button">Гости</button>
        </div>
        <div class="table_overflow">
            <table class="members_table" id="members_table">
                <tr>
                    <th>Ф.И.О.</th>
                    <th>Организация</th>
                    <th>Конкурсная работа</th>
                    <th>Комментариев отправлено</th>
                </tr>
                <?php $__currentLoopData = $applications->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($app->member_status->name == 'Участник'): ?>
                        <tr>
                            <td><?php echo e($app->name); ?></td>
                            <td><?php echo e($app->organization); ?></td>
                            <td>
                                <a href="<?php echo e(url('application/'.$app->id)); ?>"><?php echo e($app->festival->name); ?></a>
                            </td>
                            <td>
                                <?php echo e(count($app->user->comments)); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <table class="members_table d_none" id="guests_table">
                <tr>
                    <th>Ф.И.О.</th>
                    <th>Организация</th>
                    <th>Фестиваль</th>
                    <th>Комментариев отправлено</th>
                </tr>
                <?php $__currentLoopData = $applications->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($app->member_status->name == 'Гость'): ?>
                        <tr>
                            <td><?php echo e($app->name); ?></td>
                            <td><?php echo e($app->organization); ?></td>
                            <td><a href="<?php echo e(url('festivals/'.$app->festival->id)); ?>"><?php echo e($app->festival->name); ?></a></td>
                            <td>
                                <?php echo e(count($app->user->comments)); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\localhost\festival\resources\views/members.blade.php ENDPATH**/ ?>