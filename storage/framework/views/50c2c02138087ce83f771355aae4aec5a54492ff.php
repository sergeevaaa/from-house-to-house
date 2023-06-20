<?php $__env->startSection('title'); ?>
    <?php if(isset($festival)): ?>
        <?php echo e($festival->name); ?> — Панель администратора
    <?php else: ?>
        Новый фестиваль — Панель администратора
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(isset($festival)): ?>
        <h2><a href="<?php echo e(url('admin/festivals')); ?>">Фестивали</a> / <span class="regular_h"><?php echo e($festival->name); ?></span></h2>
        <form action="" method="post" class="admin_form">
            <?php echo csrf_field(); ?>
            <label for="id">ID фестиваля (необязательно)</label>
            <input type="number" name="id" id="id" value="<?php echo e($festival->id); ?>">
            <label for="name">Название фестиваля</label>
            <input type="text" name="name" id="name" value="<?php echo e($festival->name); ?>" required>
            <div class="form_dates">
                <div class="form_date">
                    <label for="name">Начало фестиваля</label>
                    <input type="date" name="start" id="start" value="<?php echo e($festival->start); ?>">
                </div>
                <div class="form_date">
                    <label for="end">Конец фестиваля</label>
                    <input type="date" name="end" id="end" value="<?php echo e($festival->end); ?>">
                </div>
            </div>
            <div class="form_dates">
                <div class="form_date">
                    <label for="deadline">Срок подачи (участники)</label>
                    <input type="date" name="deadline" id="deadline" value="<?php echo e($festival->deadline); ?>">
                </div>
                <div class="form_date">
                    <label for="deadline_members">Срок подачи (гости)</label>
                    <input type="date" name="deadline_members" id="deadline_members" value="<?php echo e($festival->deadline_members); ?>">
                </div>
            </div>
            <label for="">Набор технологий</label>
            <div class="add_technology_block">
                <label  class="add_technology">
                    <input type="checkbox" id="technology_all">
                    <label for="technology_all">Выбрать все</label>
                </label>
                <?php $__currentLoopData = $technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label  class="add_technology">
                        <input type="checkbox" id="technology_<?php echo e($technology->id); ?>" name="technology[<?php echo e($technology->id); ?>]" <?php $__currentLoopData = $festival->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($item->id == $technology->id): ?> checked <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> value="<?php echo e($technology->id); ?>">
                        <label for="technology_<?php echo e($technology->id); ?>"><?php echo e($technology->name); ?></label>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button type="submit" class="form_btn btn">Сохранить</button>
        </form>
    <?php else: ?>
        <h2>Новый фестиваль</h2>
        <form action="" method="post" class="admin_form">
            <?php echo csrf_field(); ?>
            <label for="id">ID фестиваля (необязательно)</label>
            <input type="number" name="id" id="id">
            <label for="name">Название фестиваля</label>
            <input type="text" name="name" id="name" required>
            <div class="form_dates">
                <div class="form_date">
                    <label for="start">Начало фестиваля</label>
                    <input type="date" name="start" id="start">
                </div>
                <div class="form_date">
                    <label for="end">Конец фестиваля</label>
                    <input type="date" name="end" id="end">
                </div>
            </div>
            <div class="form_date">
                <label for="deadline">Срок подачи заявки</label>
                <input type="date" name="deadline" id="deadline">
            </div>
            <label for="">Набор технологий</label>
            <div class="add_technology_block">
                <label  class="add_technology">
                    <input type="checkbox" id="technology_all">
                    <label for="technology_all">Выбрать все</label>
                </label>
                <?php $__currentLoopData = $technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label  class="add_technology">
                        <input type="checkbox" id="technology_<?php echo e($technology->id); ?>" name="technology[<?php echo e($technology->id); ?>]" value="<?php echo e($technology->id); ?>">
                        <label for="technology_<?php echo e($technology->id); ?>"><?php echo e($technology->name); ?></label>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button type="submit" class="form_btn btn">Добавить</button>
        </form>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/admin/festival.blade.php ENDPATH**/ ?>