<?php $__env->startSection('title'); ?>
    Технологии — Панель администратора
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(isset($edit_technology)): ?>
        <h2><a href="<?php echo e(url('admin/technologies')); ?>">Технологии</a> / <span class="regular_h">Изменить технологию</span></h2>
        <form action="" method="post" class="simple_form">
            <?php echo csrf_field(); ?>
            <div class="input_block">
                <label for="name">Название технологии</label>
                <input type="text" name="name" id="name" value="<?php echo e($edit_technology->name); ?>" required>
            </div>
            <button type="submit" class="form_btn btn">Сохранить</button>
        </form>
    <?php else: ?>
        <h2><a href="<?php echo e(url('admin/technologies')); ?>">Технологии</a> / <span class="regular_h">Добавить технологию</span></h2>
        <form action="" method="post" class="simple_form">
            <?php echo csrf_field(); ?>
            <div class="input_block">
                <label for="name">Название технологии</label>
                <input type="text" name="name" id="name" required>
            </div>
            <button type="submit" class="form_btn btn">Добавить</button>
        </form>
    <?php endif; ?>
    <p class="red_note" style="margin-bottom: 20px">При удалении технологии все заявки, связанные с данной технологией, будут также удалены!</p>
    <h2>Технологии</h2>
    <table class="admin_table technologies_table">
        <tr>
            <th>Название</th>
            <th class="table_actions">Действия</th>
        </tr>
        <?php $__currentLoopData = $technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text_left"><?php echo e($technology->name); ?></td>
                <td>
                    <div class="table_action">
                        <a href="<?php echo e(url('admin/technologies/'.$technology->id)); ?>"><img src="<?php echo e(asset('img/icons/edit.png')); ?>" alt="Изменить" title="Изменить"></a>
                        <form action="<?php echo e(url('admin/technologies/'.$technology->id.'/delete')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="button" class="image_btn action_btn form_confirm_button"><img src="<?php echo e(asset('img/icons/delete.png')); ?>" alt="Изменить" title="Удалить"></button>
                            <dialog open class="d_none">
                                <h2>Вы уверены?</h2>
                                <p>Вы действительно хотите выполнить это действие?</p>
                                <div class="dialog_buttons">
                                    <button type="submit" class="btn form_btn dialog_accept_btn">Да</button>
                                    <button type="button" class="btn dialog_cancel_btn">Отмена</button>
                                </div>
                            </dialog>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/admin/technologies.blade.php ENDPATH**/ ?>