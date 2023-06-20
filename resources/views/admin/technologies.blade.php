@extends('layouts.admin')

@section('title')
    Технологии — Панель администратора
@endsection

@section('content')
    @isset($edit_technology)
        <h2><a href="{{url('admin/technologies')}}">Технологии</a> / <span class="regular_h">Изменить технологию</span></h2>
        <form action="" method="post" class="simple_form">
            @csrf
            <div class="input_block">
                <label for="name">Название технологии</label>
                <input type="text" name="name" id="name" value="{{$edit_technology->name}}" required>
            </div>
            <button type="submit" class="form_btn btn">Сохранить</button>
        </form>
    @else
        <h2><a href="{{url('admin/technologies')}}">Технологии</a> / <span class="regular_h">Добавить технологию</span></h2>
        <form action="" method="post" class="simple_form">
            @csrf
            <div class="input_block">
                <label for="name">Название технологии</label>
                <input type="text" name="name" id="name" required>
            </div>
            <button type="submit" class="form_btn btn">Добавить</button>
        </form>
    @endisset
    <p class="red_note" style="margin-bottom: 20px">При удалении технологии все заявки, связанные с данной технологией, будут также удалены!</p>
    <h2>Технологии</h2>
    <table class="admin_table technologies_table">
        <tr>
            <th>Название</th>
            <th class="table_actions">Действия</th>
        </tr>
        @foreach($technologies as $technology)
            <tr>
                <td class="text_left">{{$technology->name}}</td>
                <td>
                    <div class="table_action">
                        <a href="{{url('admin/technologies/'.$technology->id)}}"><img src="{{asset('img/icons/edit.png')}}" alt="Изменить" title="Изменить"></a>
                        <form action="{{url('admin/technologies/'.$technology->id.'/delete')}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="image_btn action_btn form_confirm_button"><img src="{{asset('img/icons/delete.png')}}" alt="Изменить" title="Удалить"></button>
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
                </td>
            </tr>
        @endforeach
    </table>
@endsection
