@extends('layouts.admin')

@section('title')
    Управление заявками — Панель администратора
@endsection

@section('content')
    <h2>Управление заявками</h2>
    <div class="admin_actions">
        <form action="">
            <select name="festival" class="app_select admin_select">
                <option value="all" selected>Все фестивали</option>
                @foreach($festivals as $festival)
                    <option value="{{$festival->id}}" @if(request()->get('festival') == $festival->id) selected @endif>{{$festival->name}}</option>
                @endforeach
            </select>
        </form>
        <!--<a href="{{url('')}}" class="admin_btn green_btn form_btn btn">Экспорт</a>-->
    </div>
    <div class="applications_block admin_block">
        @if(request()->get('festival') == null || request()->get('festival') == 'all')
            @foreach($festivals as $festival)
                <div class="festival_apps_block">
                    <h3>{{$festival->name}} <span class="regular_h">(<?php echo count($festival->applications)?>)</span></h3>
                    <div class="festival_apps_block_overflow">
                        <table class="admin_table apps_table">
                            <tr>
                                <th>№</th>
                                <th>Ф.И.О</th>
                                <th>Дата подачи</th>
                                <th>Статус</th>
                                <th></th>
                            </tr>
                            @if(count($festival->applications) > 0)
                                @foreach($festival->applications->sortBy('app_status_id') as $app)
                                    <tr>
                                        <td class="small_col">{{$app->id}}</td>
                                        <td>{{$app->name}}</td>
                                        <td>{{$app->created_at}}</td>
                                        <td class="app_status_col">{{$app->app_status->name}}</td>
                                        <td class="table_action" style="display: table-cell">
                                            <a href="{{url('admin/application/'.$app->id)}}"><img src="{{asset('img/icons/view.png')}}" alt="Посмотреть"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">Список заявок пуст</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            @endforeach
        @else
            @foreach($festivals as $festival)
                @if($festival->id == request()->get('festival'))
                    <div class="festival_apps_block">
                        <h3>{{$festival->name}} <span class="regular_h">(<?php echo count($festival->applications)?>)</span></h3>
                        <div class="festival_apps_block_overflow">
                            <table class="admin_table apps_table">
                                <tr>
                                    <th>№</th>
                                    <th>Ф.И.О</th>
                                    <th>Дата подачи</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                @if(count($festival->applications) > 0)
                                    @foreach($festival->applications->sortBy('name') as $app)
                                        <tr>
                                            <td class="small_col">{{$app->id}}</td>
                                            <td>{{$app->name}}</td>
                                            <td>{{$app->created_at}}</td>
                                            <td class="app_status_col">{{$app->app_status->name}}</td>
                                            <td class="table_action" style="display: table-cell">
                                                <a href="{{url('admin/application/'.$app->id)}}"><img src="{{asset('img/icons/view.png')}}" alt="Посмотреть"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Список заявок пуст</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
