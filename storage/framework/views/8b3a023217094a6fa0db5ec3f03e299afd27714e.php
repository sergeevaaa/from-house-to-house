<?php $__env->startSection('title'); ?>
    <?php echo e($app->name); ?> — <?php echo e($app->festival->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2><a href="<?php echo e(url('festivals/'.$app->festival->id)); ?>"><?php echo e($app->festival->name); ?></a> / <span class="regular_h"><?php echo e($app->name); ?></span></h2>
    <div class="app_block">
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
        <div class="app_video">
            <iframe type="text/html" style="width: 100%; height: 100%" src="<?php echo e($player_src); ?>" frameborder="0" allowfullscreen"></iframe>
        </div>
        <div class="app_info info_block">
            <?php if(isset($app->technology_selected)): ?>
                <p>Технология: <?php echo e($app->technology_selected->name); ?></p>
            <?php else: ?>
                <p>Технология: <?php echo e($app->technology); ?></p>
            <?php endif; ?>
            <p>Организация: <?php echo e($app->organization); ?></p>
            <p>Дата подачи заявки: <?php echo e(date("d.m.Y", strtotime($app->created_at))); ?></p>
            <div class="link_to_container video_link">
                <a href="<?php echo e($app->video); ?>" target="_blank" rel="noopener noreferrer" class="link_to">
                    <span>
                        <img src="<?php echo e(asset('img/icons/link.svg')); ?>" alt="">
                        Прямая ссылка
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="app_comments_block">
        <h3>Комментарии</h3>
        <?php if(date($app->festival->end, strtotime(date('Y-m-d').'+ 1 days')) >= date('Y-m-d',)): ?>
            <?php if(auth()->guard()->check()): ?>
                <?php if($app_count > 0): ?>
                    <form action="" method="post" class="comment_form">
                        <?php echo csrf_field(); ?>
                        <textarea name="comment" id="comment_text" placeholder="Добавить комментарий..." rows="1" required></textarea>
                        <button type="submit" class="btn form_btn">Отправить</button>
                    </form>
                <?php else: ?>
                    <p class="comment_alert">Чтобы добавлять комментарии, подайте заявку на участие в конкурсе в качестве участника или гостя.</p>
                <?php endif; ?>
            <?php else: ?>
                <p class="comment_alert">Чтобы добавлять комментарии, авторизуйтесь и подайте заявку на участие в фестивале в качестве участника или гостя.</p>
            <?php endif; ?>
        <?php else: ?>
            <p class="comment_alert">Срок публикации комментариев истёк.</p>
        <?php endif; ?>
        <div class="app_comments">
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="comment">
                    <div class="comment_user">
                        <div class="comment_photo" style='background-image: url("<?php echo e(asset('storage/users/'.$comment->user->photo)); ?>")'></div>
                        <div class="comment_info">
                            <p><?php echo e($comment->user->name); ?></p>
                            <span><?php echo e(date("d.m.Y H:i:s", strtotime($comment->created_at))); ?></span>
                        </div>
                    </div>
                    <div class="comment_body">
                        <p><?php echo e($comment->comment); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\localhost\festival\resources\views/application.blade.php ENDPATH**/ ?>