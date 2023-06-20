<?php $__env->startSection('description'); ?>
    Участвовать в фестивале педагогических технологий. Подайте заявку на участие в фестивале в качестве участника или гостя.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
    Регистрация на фестиваль, Заявка на фестиваль, Участвовать в фестивале педагогических технологий.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Регистрация участников — Фестиваль
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($festival != null): ?>
        <h2>Регистрация участников на <?php echo e($festival->name); ?></h2>
        <div class="info_block">
            <p>Уважаемые участники "Фестиваля педагогических технологий". Пожалуйста, пройдите обязательную регистрацию, заполнив следующую форму. Для заполнения заявки потребуется наличие аккаунта в системе. Если у вас еще нет аккаунта, пожалуйста, <a href="<?php echo e(url('reg')); ?>" class="text_mail">зарегистрируйтесь</a>.</p>
            <p>Форма зявки появится только после <a href="<?php echo e(url('auth')); ?>" class="text_mail">авторизации в аккаунте</a>.</p>
        </div>
        <?php if(auth()->guard()->check()): ?>
            <?php if($festival->deadline > date('Y-m-d')): ?>
                <div class="registration_block">
                    <form action="<?php echo e(url('registration/'.$festival->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="reg_element">
                            <p>Выберите статус для участия в Фестивале <span class="att_text">*</span></p>
                            <div class="radio_input">
                                <input type="radio" name="member_status" value="1" class="member_check">
                                <span>Гость</span>
                            </div>
                            <div class="radio_input">
                                <input type="radio" name="member_status" value="2" class="member_check" checked>
                                <span>Участник</span>
                            </div>
                        </div>
                        <div class="reg_element">
                            <p>Ф.И.О. участника фестиваля (полностью) <span class="att_text">*</span></p>
                            <input type="text" name="name" placeholder="Ответ" required>
                        </div>
                        <div class="reg_element member_element">
                            <p>Педагогическая технология, которая будет представлена на мастер-классе <span class="att_text">*</span></p>
                            <select name="technology_id" id="technology_id_select" required>
                                <option value="none" selected disabled>Выбрать</option>
                                <?php $__currentLoopData = $festival->technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($technology->id); ?>"><?php echo e($technology->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <option value="none">Другое</option>
                            </select>
                            <input type="text" name="technology" class="d_none" placeholder="Другое">
                        </div>
                        <div class="reg_element member_element">
                            <p>Ссылка на видеоматериал <span class="att_text">*</span></p>
                            <p class="note">Видеоматериал должен быть размещен на сайте RuTube. Сссылка должна иметь формат "https://rutube.ru/video/..." или "https://rutube.ru/video/private/..."</p>
                            <input type="text" name="video" placeholder="Ответ" required>
                        </div>
                        <div class="reg_element">
                            <p>Сокращенное наименование образовательной организации (в соответствии с Уставом) <span class="att_text">*</span></p>
                            <input type="text" name="organization" placeholder="Ответ" required>
                        </div>
                        <span class="red_note" style="width: 100%; margin-bottom: 10px">* Обязательные для заполнение поля</span>
                        <button type="submit" class="btn form_btn main_btn">Отправить</button>
                    </form>
                </div>
            <?php elseif($festival->deadline_members > date('Y-m-d')): ?>
                <div class="registration_block">
                    <form action="<?php echo e(url('registration/'.$festival->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="reg_element">
                            <p>Срок подачи заявки для участников Фестиваля истек. Заявки принимаются только для гостей.</p>
                            <div class="radio_input">
                                <input type="radio" name="member_status" value="1" class="member_check" checked>
                                <span>Гость</span>
                            </div>
                        </div>
                        <div class="reg_element">
                            <p>Ф.И.О. участника фестиваля (полностью) <span class="att_text">*</span></p>
                            <input type="text" name="name" placeholder="Ответ" required>
                        </div>
                        <div class="reg_element">
                            <p>Сокращенное наименование образовательной организации (в соответствии с Уставом) <span class="att_text">*</span></p>
                            <input type="text" name="organization" placeholder="Ответ" required>
                        </div>
                        <span class="red_note" style="width: 100%; margin-bottom: 10px">* Обязательные для заполнение поля</span>
                        <button type="submit" class="btn form_btn main_btn">Отправить</button>
                    </form>
                </div>
            <?php else: ?>
                <div class="error_info">
                    <p>Заявки больше не принимаются</p>
                    <span>Срок подачи заявок на текущий фестиваль истек</span>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>
        Фестиваль не обнаружен
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\localhost\festival\resources\views/registration/registration.blade.php ENDPATH**/ ?>