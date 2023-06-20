@extends('layouts.admin')

@section('title')
    Фестивали — Панель администратора
@endsection

@section('content')
    <h2>Фестивали</h2>
    <a href="{{url('admin/about')}}" class="blue_link">Информация об актуальном фестивале</a>
    <div class="admin_actions">
        <a href="{{url('admin/festival/add')}}" class="admin_btn form_btn btn">Добавить фестиваль</a>
        <!--<a href="{{url('')}}" class="admin_btn green_btn form_btn btn">Экспорт</a>-->
    </div>
    <div class="festivals admin_block">
        @foreach($festivals as $festival)
            <div class="festival">
                <div class="festival_name">
                    <h3>{{$festival->name}}</h3>
                    <span>(@isset($festival->start){{$festival->start}} @else??? @endisset() — @isset($festival->end) {{$festival->end}}@else ???@endisset())</span>
                </div>
                <div class="festival_actions">
                    <a href="{{url('admin/festival/'.$festival->id)}}">Настроить</a>
                    <a href="{{url('admin/applications?festival='.$festival->id)}}">Управление заявками</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
