@extends('layouts.admin')

@section('title')
    Сертификат №{{$app->id}} — Управление сертификатами
@endsection

@section('content')
        <h2><a href="{{url('admin/member')}}">Список гостей и участников</a> / <span class="regular_h">Сертификат №{{$app->id}} - {{$app->name}}</span></h2>
        <div class="app_info info_block admin_app_info">
        <img src="{{asset('storage/certificate/'.$app->certificate)}}" alt="Сертификат отсутствует"  style="width: 400px">
        </div>
        <form action="{{url('admin/certificate_update/{id}')}}" method="post" class="admin_form app_form">
            @csrf
            <input type="file" name="certificate" id="certificate">
          
            <button type="submit" class="form_btn btn">Изменить сертификат</button>
         
        </form>
@endsection
