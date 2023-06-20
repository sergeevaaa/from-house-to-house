<?php $__env->startSection('description'); ?>
    Список участников и гостей фестиваля педагогических технологий. Оставляйте свои комментарии и получайте сертификат.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
    Участники фестиваля, гости фестиваля, Список участнико, Список гостей
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
            <div class="">
            <label for="sort">Отсортировать по</label>
                <select name="sort" id="sort">
                    <option value="festival_id"> фестивалю</option>
                    <option value="name"> алфавиту</option>
                    <option value="organization"> учебному заведению</option>
                </select>
        </div>
        </div>


        <div class="table_overflow">
            <table class="members_table" id="members_table">
                <tr>
                    <th>Ф.И.О.</th>
                    <th class="none">Организация</th>
                    <th>Конкурсная работа</th>
                    <th class="none">Комментариев отправлено</th>
                </tr>
                
                <?php $__currentLoopData = $applications->sortBy('sort'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($app->member_status->name == 'Участник'): ?>
                        <tr>
                            <td><?php echo e($app->name); ?></td>
                            <td class="none"><?php echo e($app->organization); ?></td>
                            <td>
                                <a href="<?php echo e(url('application/'.$app->id)); ?>"><?php echo e($app->festival->name); ?></a>
                            </td>
                            <td class="none">
                                <?php echo e(count($app->user->comments)); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </table>
            <table class="members_table d_none" id="guests_table">
                <tr>
                    <th>Ф.И.О.</th>
                    <th class="none">Организация</th>
                    <th>Фестиваль</th>
                    <th class="none">Комментариев отправлено</th>
                </tr>
                <?php $__currentLoopData = $applications->sortBy('festival_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($app->member_status->name == 'Гость'): ?>
                        <tr>
                            <td><?php echo e($app->name); ?></td>
                            <td class="none"><?php echo e($app->organization); ?></td>
                            <td><a href="<?php echo e(url('festivals/'.$app->festival->id)); ?>"><?php echo e($app->festival->name); ?></a></td>
                            <td class="none">
                                <?php echo e(count($app->user->comments)); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/members.blade.php ENDPATH**/ ?>