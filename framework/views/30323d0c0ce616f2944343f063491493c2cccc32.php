<?php $__env->startSection('title'); ?>
    Помощь — Фестиваль
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
    Инструкция пользователя. Помощь участникам Фестиваля. Свяжитесь с нами, если у вас есть впоросы. Скачать инструкцию пользователя.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
    Инструкция пользователя фестиваля, контакты организаторов
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Инструкция пользователя</h2>
    <div class="info_block">
        <?php
            echo $data['instruction'];
        ?>
        <div class="link_to_container">
            <a href="<?php echo e(asset('storage/files/'.$data['instruction_file'])); ?>" target="_blank" rel="noopener noreferrer" class="link_to">
            <span>
                <img src="<?php echo e(asset('img/icons/link.svg')); ?>" alt="link">
                Инструкция пользователя
            </span>
            </a>
        </div>
    </div>
    <h2>Связаться с нами</h2>
    <div class="info_block">
        <?php
            echo $data['help'];
        ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/instructions.blade.php ENDPATH**/ ?>