<?php $__env->startSection('title'); ?>
    Личный кабинет — Фестиваль
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>Личные данные</h2>
    <?php if(isset($user)): ?>
        <div class="user_block">
            <div class="user_info">
                <div class="user_photo" style='background-image: url("<?php echo e(asset('storage/users/'.$user->photo)); ?>")'></div>
                <div class="user_data">
                    <div class="user_name_block">
                        <p><b>Имя:</b></p>
                        <div class="user_name">
                            <span><?php echo e($user->name); ?></span>
                            <img src="<?php echo e(asset('img/icons/edit-text.png')); ?>" alt="Edit" title="Изменить имя" id="edit_name" class="image_in_btn">
                        </div>
                        <form action="<?php echo e(url('account/change_name')); ?>" class="edit_name d_none" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="new_name" value="<?php echo e($user->name); ?>" required>
                            <button type="submit" class="image_btn"><img src="<?php echo e(asset('img/icons/save.png')); ?>" alt="Save" title="Сохранить" class="image_in_btn"></button>
                            <img src="<?php echo e(asset('img/icons/cancel.png')); ?>" alt="Cancel" title="Отмена" id="edit_cancel" class="image_in_btn" style="margin-left: 10px">
                        </form>
                    </div>
                    <p><b>Email:</b> <?php echo e($user->email); ?></p>
                    <label class="user_photo_btn" for="user_photo">Изменить фото</label>
                    <form action="<?php echo e(url('account/change_photo')); ?>" class="user_file" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="file" id="user_photo" name="photo" class="d_none">
                    </form>
                </div>
            </div>
            <div class="user_actions">
                <?php if($user->role == 1): ?>
                    <a href="<?php echo e(url('admin/festivals')); ?>" class="btn form_btn">Панель администратора</a>
                <?php endif; ?>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" class="btn red_btn">Выйти из аккаунта</a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d_none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <h2>Ваши заявки</h2>
    <div class="account_festivals">
        <?php if(count($apps) > 0): ?>
            <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($app->member_status_id == 2): ?>
                   <div class="festival_block <?php if($app->app_status->name == 'Заявка отклонена'): ?> red_block <?php endif; ?>">
                       <div class="festival_head">
                           <div class="festival_name">
                               <h3><?php echo e($app->festival->name); ?></h3>
                               <span>(<?php if(isset($app->festival->start)): ?><?php echo e(date("d.m.Y", strtotime($app->festival->start))); ?> <?php else: ?>??? <?php endif; ?> — <?php if(isset($app->festival->end)): ?> <?php echo e(date("d.m.Y", strtotime($app->festival->end))); ?><?php else: ?> ???<?php endif; ?>)</span>
                           </div>
                           <p class="festival_status"><?php echo e($app->app_status->name); ?></p>
                       </div>
                       <?php if(isset($app->note)): ?>
                           <p class="red_note">Замечание: <?php echo e($app->note); ?></p>
                       <?php endif; ?>
                       <p class="festival_links">
                           <?php if($app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена'): ?><a href="<?php echo e(url('application/'.$app->id)); ?>" class="festival_link">Перейти</a><?php endif; ?>
                           <?php if($app->app_status->name == 'На рассмотрении'): ?>
                               <form action="<?php echo e(url('account/app/'.$app->id.'/cancel')); ?>">
                                   <button type="button" class="festival_link btn form_confirm_button">Отменить заявку</button>
                                   <dialog open class="d_none">
                                       <h2>Вы уверены?</h2>
                                       <p>Вы действительно хотите выполнить это действие?</p>
                                       <div class="dialog_buttons">
                                           <button type="submit" class="btn form_btn dialog_accept_btn">Да</button>
                                           <button type="button" class="btn dialog_cancel_btn">Отмена</button>
                                       </div>
                                   </dialog>
                               </form>
                           <?php endif; ?>
                           <?php if($app->app_status->name == 'Заявка отклонена'): ?><a href="<?php echo e(url('account/app/'.$app->id.'/reset')); ?>" class="festival_link">Подать снова</a><?php endif; ?>
                       </p>
                       <div class="festival_info">
                           <p><?php echo e($app->member_status->name); ?>: <?php echo e($app->name); ?></p>
                           <p>Технология: <?php if(isset($app->technology_id)): ?> <?php echo e($app->technology_selected->name); ?> <?php else: ?> <?php echo e($app->technology); ?> <?php endif; ?></p>
                           <p>Организация: <?php echo e($app->organization); ?></p>
                           <p>Видео: <a href="<?php echo e($app->video); ?>" class="text_mail" target="_blank" rel="noopener noreferrer">ссылка</a></p>
                       </div>
                       <div class="link_to_container">
                            <a href="<?php echo e(asset('storage/files/'.$data['file'])); ?>" target="_blank" rel="noopener noreferrer" class="link_to">
                                <span>
                                    <img src="<?php echo e(asset('img/icons/link.svg')); ?>" alt="download">
                                    Скачать положение
                                </span>
                            </a>
                        </div>
                       
                   </div>
                <?php else: ?>
                    <div class="festival_block <?php if($app->app_status->name == 'Заявка отклонена'): ?> red_block <?php endif; ?>">
                        <div class="festival_head">
                            <div class="festival_name">
                                <h3><?php echo e($app->festival->name); ?></h3>
                                <span>(<?php if(isset($app->festival->start)): ?><?php echo e(date("d.m.Y", strtotime($app->festival->start))); ?> <?php else: ?>??? <?php endif; ?> — <?php if(isset($app->festival->end)): ?> <?php echo e(date("d.m.Y", strtotime($app->festival->end))); ?><?php else: ?> ???<?php endif; ?>)</span>
                            </div>
                            <p class="festival_status"><?php echo e($app->app_status->name); ?></p>
                        </div>
                        <?php if(isset($app->note)): ?>
                            <p class="red_note">Замечание: <?php echo e($app->note); ?></p>
                        <?php endif; ?>
                        <p class="festival_links">
                        <?php if($app->app_status->name == 'На рассмотрении'): ?>
                            <form action="<?php echo e(url('account/app/'.$app->id.'/cancel')); ?>">
                                <button type="button" class="festival_link btn form_confirm_button">Отменить заявку</button>
                                <dialog open class="d_none">
                                    <h2>Вы уверены?</h2>
                                    <p>Вы действительно хотите выполнить это действие?</p>
                                    <div class="dialog_buttons">
                                        <button type="submit" class="btn form_btn dialog_accept_btn">Да</button>
                                        <button type="button" class="btn dialog_cancel_btn">Отмена</button>
                                    </div>
                                </dialog>
                            </form>
                        <?php endif; ?>
                        <?php if($app->app_status->name == 'Заявка отклонена'): ?><a href="<?php echo e(url('account/app/'.$app->id.'/reset')); ?>" class="festival_link">Подать снова</a><?php endif; ?>
                        </p>
                        <div class="festival_info">
                            <p><?php echo e($app->member_status->name); ?>: <?php echo e($app->name); ?></p>
                            <p>Организация: <?php echo e($app->organization); ?></p>
                            <div class="link_to_container">
                        <?php if(isset($app->certificate)): ?>
                        </div>                      
                            <a href="<?php echo e(asset('storage/certificate/'.$app->certificate)); ?>" target="_blank" rel="noopener noreferrer" class="link_to">
                                <span>
                                    <img src="<?php echo e(asset('img/icons/link.svg')); ?>" alt="download">
                                    Скачать сертефикат
                                </span>
                            </a>
                        </div>
                        <?php endif; ?>


                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="info_p">Вы еще не принимали участие ни в одном фестивале. Чтобы подать заявку на участие, перейдите на страницу <a href="<?php echo e(url('registration')); ?>" class="text_mail">регистрации участников</a>.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\festival\resources\views/account.blade.php ENDPATH**/ ?>