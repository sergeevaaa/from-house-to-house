@extends('layouts.admin')

@section('title')
    Заявка №{{$app->id}} — Управление завявками
@endsection

@section('content')
        <h2><a href="{{url('admin/applications')}}">Управление заявками</a> / <span class="regular_h">Заявка №{{$app->id}} - {{$app->name}}</span></h2>
        <div class="app_info info_block admin_app_info">
            <p><b>Статус:</b> {{$app->member_status->name}}</p>
            @isset($app->technology_selected)
                <p><b>Технология:</b> {{$app->technology_selected->name}}</p>
            @else
                <p><b>Технология:</b> {{$app->technology}}</p>
            @endisset
            <p><b>Организация:</b> {{$app->organization}}</p>
            <p><b>Дата подачи заявки:</b> {{$app->created_at}}</p>
            <p><b>Ссылка:</b> <a href="{{$app->video}}" target="_blank" class="text_mail">Смотреть</a> ( {{$app->video}} )</p>
        </div>
        <form action="" method="post" class="admin_form app_form">
            @csrf
            <textarea name="note" id="" rows="5" placeholder="Добавить замечание...">{{$app->note}}</textarea>
            <div class="select_button_block">
                <select name="status" id="app_status_select">
                    @foreach($statuses as $status)
                        <option value="{{$status->id}}" @if($status->id == $app->app_status_id) selected @endif>{{$status->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="form_btn btn">Изменить статус</button>
            </div>
        </form>
@endsection
