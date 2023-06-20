<?php $__env->startSection('title'); ?>
    Комментарии — Панель администратора
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Управление комментариями</h2>
    <div class="comments admin_block">
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="comment_block">
                <div class="comment_top_info">
                    <div class="comment_links">
                        <a href="<?php echo e(url('festivals/'.$comment->application->festival->id)); ?>"><?php echo e($comment->application->festival->name); ?></a> / <a href="<?php echo e(url('application/'.$comment->application->id)); ?>"><?php echo e($comment->application->name); ?></a>
                    </div>
                    <form action="<?php echo e(url('admin/comments/'.$comment->id.'/delete')); ?>" method="post">
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
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/admin/comments.blade.php ENDPATH**/ ?>