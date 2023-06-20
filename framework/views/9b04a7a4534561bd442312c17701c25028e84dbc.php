<?php $__env->startSection('title'); ?>
    О фестивале — Панель администратора
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Управление информацией о фестивале</h2>
    <div class="festivals admin_block about_block">
        <label class="user_photo_btn admin_file_input" for="about_file_select">Изменить файл положения</label><span class="about_file_info">(<?php echo e($data['file']); ?>)</span>
        <form action="<?php echo e(url('admin/about/change_file')); ?>" class="user_file" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="file" id="about_file_select" name="file" class="d_none">
        </form>
        <br>
        <label class="user_photo_btn admin_file_input" for="instruction_file_select">Изменить файл инструкции пользователя</label><span class="about_file_info">(<?php echo e($data['instruction_file']); ?>)</span>
        <form action="<?php echo e(url('admin/about/change_file_instruction')); ?>" class="user_file" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="file" id="instruction_file_select" name="instruction_file" class="d_none">
        </form>
        <form action="<?php echo e(url('admin/about/reset')); ?>" class="user_file" method="post">
            <?php echo csrf_field(); ?>
            <button type="button" class="about_reset_btn form_confirm_button">Восстановить изначальные данные</button>
            <dialog open class="d_none">
                <h2>Вы уверены?</h2>
                <p>Вы действительно хотите выполнить это действие?</p>
                <div class="dialog_buttons">
                    <button type="submit" class="btn form_btn dialog_accept_btn">Да</button>
                    <button type="button" class="btn dialog_cancel_btn">Отмена</button>
                </div>
            </dialog>
        </form>
        <form action="<?php echo e(url('admin/about/info')); ?>" method="post" class="admin_form about_form">
            <?php echo csrf_field(); ?>
            <h3 class="about_title">Основная информация</h3>
            <textarea name="mainInfo" id="mainInfo"><?php echo e($data['mainInfo']); ?></textarea>
            <h3 class="about_title">Краткая информация</h3>
            <textarea name="short" class="about_area" cols="" rows="6"><?php echo e($data['short']); ?></textarea>
            <h3 class="about_title">Положение</h3>
            <textarea name="editor" id="editor"><?php echo e($data['info']); ?></textarea>
            <h3 class="about_title">Инструкция комментирования записей</h3>
            <textarea name="instruction" id="instruction"><?php echo e($data['instruction']); ?></textarea>
            <h3 class="about_title">Связаться с нами</h3>
            <textarea name="editor_help" id="editor_help"><?php echo e($data['help']); ?></textarea>
            <button type="submit" class="btn form_btn">Сохранить</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#mainInfo' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#instruction' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor_help' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/admin/about.blade.php ENDPATH**/ ?>