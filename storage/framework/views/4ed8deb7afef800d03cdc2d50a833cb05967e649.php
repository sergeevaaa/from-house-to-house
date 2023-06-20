<?php $__env->startSection('title'); ?>
    Управление заявками — Панель администратора
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Управление заявками</h2>
    <div class="admin_actions">
        <form action="">
            <select name="festival" class="app_select admin_select">
                <option value="all" selected>Все фестивали</option>
                <?php $__currentLoopData = $festivals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $festival): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($festival->id); ?>" <?php if(request()->get('festival') == $festival->id): ?> selected <?php endif; ?>><?php echo e($festival->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </form>
        <!--<a href="<?php echo e(url('')); ?>" class="admin_btn green_btn form_btn btn">Экспорт</a>-->
    </div>
    <div class="applications_block admin_block">
        <?php if(request()->get('festival') == null || request()->get('festival') == 'all'): ?>
            <?php $__currentLoopData = $festivals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $festival): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="festival_apps_block">
                    <h3><?php echo e($festival->name); ?> <span class="regular_h">(<?php echo count($festival->applications)?>)</span></h3>
                    <div class="festival_apps_block_overflow">
                        <table class="admin_table apps_table">
                            <tr>
                                <th>№</th>
                                <th>Ф.И.О</th>
                                <th>Дата подачи</th>
                                <th>Статус</th>
                                <th></th>
                            </tr>
                            <?php if(count($festival->applications) > 0): ?>
                                <?php $__currentLoopData = $festival->applications->sortBy('app_status_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="small_col"><?php echo e($app->id); ?></td>
                                        <td><?php echo e($app->name); ?></td>
                                        <td><?php echo e($app->created_at); ?></td>
                                        <td class="app_status_col"><?php echo e($app->app_status->name); ?></td>
                                        <td class="table_action" style="display: table-cell">
                                            <a href="<?php echo e(url('admin/application/'.$app->id)); ?>"><img src="<?php echo e(asset('img/icons/view.png')); ?>" alt="Посмотреть"></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">Список заявок пуст</td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php $__currentLoopData = $festivals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $festival): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($festival->id == request()->get('festival')): ?>
                    <div class="festival_apps_block">
                        <h3><?php echo e($festival->name); ?> <span class="regular_h">(<?php echo count($festival->applications)?>)</span></h3>
                        <div class="festival_apps_block_overflow">
                            <table class="admin_table apps_table">
                                <tr>
                                    <th>№</th>
                                    <th>Ф.И.О</th>
                                    <th>Дата подачи</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                <?php if(count($festival->applications) > 0): ?>
                                    <?php $__currentLoopData = $festival->applications->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="small_col"><?php echo e($app->id); ?></td>
                                            <td><?php echo e($app->name); ?></td>
                                            <td><?php echo e($app->created_at); ?></td>
                                            <td class="app_status_col"><?php echo e($app->app_status->name); ?></td>
                                            <td class="table_action" style="display: table-cell">
                                                <a href="<?php echo e(url('admin/application/'.$app->id)); ?>"><img src="<?php echo e(asset('img/icons/view.png')); ?>" alt="Посмотреть"></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">Список заявок пуст</td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/admin/applications.blade.php ENDPATH**/ ?>