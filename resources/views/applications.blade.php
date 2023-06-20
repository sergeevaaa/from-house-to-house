@extends('layouts.main')

@section('title')
    {{$festival->name}}
@endsection

@section('content')
    <h2><a href="{{url('festivals/'.$festival->id)}}">{{$festival->name}}</a> / <span class="regular_h">Все участники</span></h2>
    <div class="applications_list">
        @if(count($apps) > 0)
            <ol class="app_list">
            @foreach($apps as $app)
                @if($app->app_status_id == 2)
                    <li><p class="app_link"><a href="{{url('application/'.$app->id)}}">{{$app->name}}</a></p></li>
                @endif
            @endforeach
            </ol>
        @else
            <p class="app_link">Список участников данного фестиваля пуст.</p>
        @endif
    </div>
@endsection
