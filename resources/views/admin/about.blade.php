@extends('layouts.admin')

@section('title')
    О фестивале — Панель администратора
@endsection

@section('content')
    <h2>Управление информацией о фестивале</h2>
    <div class="festivals admin_block about_block">
        <label class="user_photo_btn admin_file_input" for="about_file_select">Изменить файл положения</label><span class="about_file_info">({{$data['file']}})</span>
        <form action="{{url('admin/about/change_file')}}" class="user_file" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" id="about_file_select" name="file" class="d_none">
        </form>
        <br>
        <label class="user_photo_btn admin_file_input" for="instruction_file_select">Изменить файл инструкции пользователя</label><span class="about_file_info">({{$data['instruction_file']}})</span>
        <form action="{{url('admin/about/change_file_instruction')}}" class="user_file" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" id="instruction_file_select" name="instruction_file" class="d_none">
        </form>
        <form action="{{url('admin/about/reset')}}" class="user_file" method="post">
            @csrf
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
        <form action="{{url('admin/about/info')}}" method="post" class="admin_form about_form">
            @csrf
            <h3 class="about_title">Основная информация</h3>
            <textarea name="mainInfo" id="mainInfo">{{$data['mainInfo']}}</textarea>
            <h3 class="about_title">Краткая информация</h3>
            <textarea name="short" class="about_area" cols="" rows="6">{{$data['short']}}</textarea>
            <!-- <h3 class="about_title">Положение</h3>
            <textarea name="editor" id="editor">{{$data['info']}}</textarea> -->
            <h3 class="about_title">Инструкция комментирования записей</h3>
            <textarea name="instruction" id="instruction">{{$data['instruction']}}</textarea>
            <h3 class="about_title">Связаться с нами</h3>
            <textarea name="editor_help" id="editor_help">{{$data['help']}}</textarea>
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
@endsection
