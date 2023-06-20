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
    <div class="info_block_1" style="display:flex; flex-direction:row;">
    <div class="info_block">
        <?php
            echo $data['mainInfo'];
        ?>
    </div>
   
    </div>
    <div class="info_block">
        <div class="link_to_container">
            <a href="<?php echo e(asset('storage/files/'.$data['file'])); ?>" target="_blank" rel="noopener noreferrer" class="link_to">
                <span>
                    <img src="<?php echo e(asset('img/icons/link.svg')); ?>" alt="download">
                    Скачать положение
                </span>
            </a>
        </div>
        <h2>Участники фестиваля этого года</h2>
            <div class="primers">
                
            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($app->festival->end >= date('Y-m-d')): ?>
                        <?php if(@isset($app->video)): ?>
                        <div class="block_primer">
                        <?php
                        $video_src = $app->video;
                        $video_array = explode('video/', $video_src);
                        try {
                            $player_array = explode('private/', $video_array[1]);
                            $player_array_2 = explode('/', $player_array[1]);
                            $player_src = 'https://rutube.ru/play/embed/'.$player_array_2[0];
                        }catch (\Exception $e) {
                            $player_src = 'https://rutube.ru/play/embed/'.$video_array[1];;
                        }
                        ?>

                            <div class="app_video_primer">
                                <iframe type="text/html" style="width: 100%; height: 100%" src="<?php echo e($player_src); ?>" frameborder="0" allowfullscreen"></iframe>
                            </div>
                            <p class="app_link"><a href="<?php echo e(url('application/'.$app->id)); ?>"><?php echo e($app->name); ?></a></p>

                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/index.blade.php ENDPATH**/ ?>