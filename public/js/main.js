$(document).ready(function() {

    //Бургер меню
    $('.burger_button').click(function() {
        $('.burger_button').toggleClass('active');
        $('nav').toggleClass('active');
    });


    //Смена имени профиля
    $('#edit_name').click(function() {
        $('.user_name').toggleClass('d_none');
        $('.edit_name').toggleClass('d_none');
        $('.edit_name').children('input').focus();
    });

    $('#edit_cancel').click(function() {
        $('.user_name').toggleClass('d_none');
        $('.edit_name').toggleClass('d_none');
    });


    //Смена фото профиля
    $('#user_photo').change(function() {
        this.form.submit();
    });

    //Смена файла положения
    $('#about_file_select').change(function() {
        this.form.submit();
    });
    //Смена файла инструкции
    $('#instruction_file_select').change(function() {
        this.form.submit();
    });


    //Выбрать все технологии
    $('#technology_all').change(function() {
        $('.add_technology').children('input').prop('checked', $(this).is(':checked'));
    });


    //Авто-размер комментария
    $("#comment_text").each(function () {
        this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
    }).on("input", function () {
        this.style.height = "auto";
        this.style.height = (this.scrollHeight) + "px";
    });


    //Выбор фестиваля - управление заявками
    $('.admin_select').change(function() {
        this.form.submit();
    });


    //Смена статуса заявки
    $('#app_status_select').change(function() {
        if (this.value == 3) {
            $(this).parent().parent().children('textarea').focus();
            $(this).parent().parent().children('textarea').addClass('red_border');
        }else {
            $(this).parent().parent().children('textarea').removeClass('red_border');
        }
    });


    //Просмотр участников технологии
    $('.festival_technology').click(function() {
        $(this).children('img').toggleClass('active');
        $(this).parent().children('.festival_apps').slideToggle();
    });


    //Выбор пункта другое
    $('#technology_id_select').change(function() {
        if (this.value === 'none') {
            $(this).parent().children('input').removeClass('d_none');
        }else {
            $(this).parent().children('input').addClass('d_none');
        }
    });


    //Выбор пункта другое
    $('.member_check').change(function() {
        if (this.value == 1) {
            $('.member_element').addClass('d_none');
            $('.member_element').children('input').removeAttr('required');
            $('.member_element').children('select').removeAttr('required');
        }else {
            $('.member_element').removeClass('d_none');
            $('.member_element').children('input').attr('required');
            $('.member_element').children('select').attr('required');
        }
    });


    //Участник и гости
    $('#members_button').click(function() {
        $('.members_button').removeClass('active');
        $(this).addClass('active');
        $('.members_table').addClass('d_none');
        $('#members_table').removeClass('d_none');
    });

    $('#guests_button').click(function() {
        $('.members_button').removeClass('active');
        $(this).addClass('active');
        $('.members_table').addClass('d_none');
        $('#guests_table').removeClass('d_none');
    });


    //Карта сайта
    $('.map_btn').click(function() {
        let block = '#container_' + this.getAttribute('id');
        $(this).parent().parent().children(block).toggleClass('active');
        $(this).toggleClass('active');
    });

    //Оверлей
    $('.overlay').click(function () {
       $(this).addClass('d_none');
       $('dialog').addClass('d_none');
    });


    //Модальное окно
    $('.form_confirm_button').click(function () {
        $(this).parent().children('dialog').removeClass('d_none');
        $('.overlay').removeClass('d_none');
    });

    $('.dialog_cancel_btn').click(function () {
        $(this).parent().parent().addClass('d_none');
        $('.overlay').addClass('d_none');
    });
});
