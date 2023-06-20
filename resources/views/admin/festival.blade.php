@extends('layouts.admin')

@section('title')
    @isset($festival)
        {{$festival->name}} — Панель администратора
    @else
        Новый фестиваль — Панель администратора
    @endisset
@endsection

@section('content')
    @isset($festival)
        <h2><a href="{{url('admin/festivals')}}">Фестивали</a> / <span class="regular_h">{{$festival->name}}</span></h2>
        <form action="" method="post" class="admin_form">
            @csrf
            <label for="id">ID фестиваля (необязательно)</label>
            <input type="number" name="id" id="id" value="{{$festival->id}}">
            <label for="name">Название фестиваля</label>
            <input type="text" name="name" id="name" value="{{$festival->name}}" required>
            <div class="form_dates">
                <div class="form_date">
                    <label for="name">Начало фестиваля</label>
                    <input type="date" name="start" id="start" value="{{$festival->start}}">
                </div>
                <div class="form_date">
                    <label for="end">Конец фестиваля</label>
                    <input type="date" name="end" id="end" value="{{$festival->end}}">
                </div>
            </div>
            <div class="form_dates">
                <div class="form_date">
                    <label for="deadline">Срок подачи (участники)</label>
                    <input type="date" name="deadline" id="deadline" value="{{$festival->deadline}}">
                </div>
                <div class="form_date">
                    <label for="deadline_members">Срок подачи (гости)</label>
                    <input type="date" name="deadline_members" id="deadline_members" value="{{$festival->deadline_members}}">
                </div>
            </div>
            <label for="">Набор технологий</label>
            <div class="add_technology_block">
                <label  class="add_technology">
                    <input type="checkbox" id="technology_all">
                    <label for="technology_all">Выбрать все</label>
                </label>
                @foreach($technologies as $technology)
                    <label  class="add_technology">
                        <input type="checkbox" id="technology_{{$technology->id}}" name="technology[{{$technology->id}}]" @foreach($festival->technologies as $item) @if($item->id == $technology->id) checked @endif @endforeach value="{{$technology->id}}">
                        <label for="technology_{{$technology->id}}">{{$technology->name}}</label>
                    </label>
                @endforeach
            </div>
            <button type="submit" class="form_btn btn">Сохранить</button>
        </form>
    @else
        <h2>Новый фестиваль</h2>
        <form action="" method="post" class="admin_form">
            @csrf
            <label for="id">ID фестиваля (необязательно)</label>
            <input type="number" name="id" id="id">
            <label for="name">Название фестиваля</label>
            <input type="text" name="name" id="name" required>
            <div class="form_dates">
                <div class="form_date">
                    <label for="start">Начало фестиваля</label>
                    <input type="date" name="start" id="start">
                </div>
                <div class="form_date">
                    <label for="end">Конец фестиваля</label>
                    <input type="date" name="end" id="end">
                </div>
            </div>
            <div class="form_date">
                <label for="deadline">Срок подачи заявки</label>
                <input type="date" name="deadline" id="deadline">
            </div>
            <label for="">Набор технологий</label>
            <div class="add_technology_block">
                <label  class="add_technology">
                    <input type="checkbox" id="technology_all">
                    <label for="technology_all">Выбрать все</label>
                </label>
                @foreach($technologies as $technology)
                    <label  class="add_technology">
                        <input type="checkbox" id="technology_{{$technology->id}}" name="technology[{{$technology->id}}]" value="{{$technology->id}}">
                        <label for="technology_{{$technology->id}}">{{$technology->name}}</label>
                    </label>
                @endforeach
            </div>
            <button type="submit" class="form_btn btn">Добавить</button>
        </form>
    @endisset
@endsection
