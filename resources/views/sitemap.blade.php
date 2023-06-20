@extends('layouts.main')

@section('title')
    Карта сайта
@endsection

@section('content')
    <h2>Карта сайта</h2>
    <div class="sitemap_block">
        <div class="sitemap">
            <p class="bold_text">Фестиваль "Калейдоскоп педагогических технологий"</p>
            <div class="links_container main_container">
                <span><a href="{{url('/')}}">О фестивале</a></span>
                <span><a href="{{url('registration')}}">Регистрация участников</a></span>
                <span><a href="{{url('help')}}">Помощь</a></span>
                <span><a href="{{url('members')}}">Участники и гости</a></span>
                <span><a href="{{url('account')}}">Личный кабинет</a></span>
                <span class="open_link"><button class="btn image_btn map_btn" id="link_0"><img src="{{asset('img/icons/add.png')}}" alt="+"></button><a href="{{url('festivals')}}">Фестивали</a></span>
                <div class="links_container" id="container_link_0">
                    @foreach($festivals as $festival)
                        @if(count($festival->technologies) > 0)
                            <span class="open_link"><button class="btn image_btn map_btn" id="link_{{$festival->id}}"><img src="{{asset('img/icons/add.png')}}" alt="+"></button><a href="{{url('festivals/'.$festival->id)}}">{{$festival->name}}</a></span>
                            <div class="links_container" id="container_link_{{$festival->id}}">
                                @foreach($festival->technologies->sortBy('name') as $technology)
                                    @php
                                        $count = 0;
                                        foreach ($technology->applications as $app) {
                                            if ($app->festival_id == $festival->id && $app->app_status->id == 2) {
                                                $count++;
                                            }
                                        }
                                    @endphp
                                    @if(count($technology->applications) > 0 && $count > 0)
                                        <span class="open_link"><button class="btn image_btn map_btn" id="link_{{$technology->id}}"><img src="{{asset('img/icons/add.png')}}" alt="+"></button><a href="{{url('festivals/'.$festival->id)}}">{{$technology->name}}</a></span>
                                        <div class="links_container" id="container_link_{{$technology->id}}">
                                            @foreach($technology->applications as $app)
                                                @if($app->festival_id == $festival->id)
                                                    <span class="blue_text">- <a href="{{url('application/'.$app->id)}}">{{$app->name}}</a></span>
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                                        <span>- <a href="{{url('festivals/'.$festival->id)}}">{{$technology->name}}</a></span>
                                    @endif
                                @endforeach
                                @php
                                    $count = 0;
                                    foreach ($festival->applications as $app) {
                                        if ($app->technology != null) {
                                            $count++;
                                        }
                                    }
                                @endphp
                                @if($count > 0)
                                    <span class="open_link"><button class="btn image_btn map_btn" id="link_00"><img src="{{asset('img/icons/add.png')}}" alt="+"></button><a href="{{url('festivals/'.$festival->id)}}">Другое</a></span>
                                    <div class="links_container" id="container_link_00">
                                        @foreach($festival->applications as $app)
                                            @if($app->technology != null && $app->app_status_id == 2)
                                                <span class="blue_text">- <a href="{{url('application/'.$app->id)}}">{{$app->name}}</a></span>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @else
                            <span>- <a href="{{url('festivals/'.$festival->id)}}">{{$festival->name}}</a></span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
