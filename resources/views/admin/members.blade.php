@extends('layouts.admin')

@section('title')
    Управление пользователями— Панель администратора
@endsection

@section('content')
    <h2>Участники и гости</h2>
    <div class="members_block">
        <div class="members_nav">
            <button id="members_button" class="btn members_button active">Участники</button>
            <button id="guests_button" class="btn members_button">Гости</button>
        </div>
        <div class="table_overflow">
            <table class="members_table" id="members_table">
                <tr>
                    <th>Ф.И.О.</th>
                    <th>Организация</th>
                    <th>Конкурсная работа</th>
                    <th>Сертификат</th>
                </tr>
                @foreach($applications as $app)
                    @if($app->member_status->name == 'Участник')
                        <tr>
                            <td>{{$app->name}}</td>
                            <td>{{$app->organization}}</td>
                            <td>
                                <a href="{{url('application/'.$app->id)}}">{{$app->festival->name}}</a>
                            </td>
                            <td>
                            <a href="{{url('admin/certificate/'.$app->id)}}">Изменить</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
            <table class="members_table d_none" id="guests_table">
                <tr>
                    <th>Ф.И.О.</th>
                    <th>Организация</th>
                    <th>Фестиваль</th>
                    <th>Сертификат</th>
                </tr>
                @foreach($applications as $app)
                    @if($app->member_status->name == 'Гость')
                        <tr>
                            <td>{{$app->name}}</td>
                            <td>{{$app->organization}}</td>
                            <td><a href="{{url('festivals/'.$app->festival->id)}}">{{$app->festival->name}}</a></td>
                            <td>
                            <a href="{{url('admin/certificate/'.$app->id)}}">Изменить</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection
