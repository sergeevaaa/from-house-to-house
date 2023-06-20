<?php $__env->startSection('description'); ?>
    Примите участие в Фестивале "Калейдоскоп педагогических технологий". Бесплатное участие в фестивале. Загружайте свои видео через сервис RuTube.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
    Калейдоскоп педагогических технологий, Фестиваль педагогических технологий, Фестиваль
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Фестиваль педагогических технологий
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>О фестивале</h2>
    <div class="info_block">
        <?php
            echo $data['mainInfo'];
        ?>
    </div>
    <h2>Положение о фестивале</h2>
    <div class="info_block">
        <?php
            echo $data['info'];
        ?>
        <div class="link_to_container">
            <a href="<?php echo e(asset('storage/files/'.$data['file'])); ?>" target="_blank" rel="noopener noreferrer" class="link_to">
                <span>
                    <img src="<?php echo e(asset('img/icons/link.svg')); ?>" alt="">
                    Скачать положение
                </span>
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\localhost\festival\resources\views/index.blade.php ENDPATH**/ ?>