@extends('layouts.main')

@section('title')
    {{$festival->name}}
@endsection

@section('content')
    <h2>{{$festival->name}}</h2>
    <span> Дата проведения: @isset($festival->start){{date("d.m.Y", strtotime($festival->start))}} @else??? @endisset() — @isset($festival->end) {{date("d.m.Y", strtotime($festival->end))}}@else ???@endisset()</span>
    <p class="all_link"><a href="{{url('festivals/'.$festival->id.'/applications')}}">Список всех участников</a></p>
    <div class="festival_technologies_block">
        <div class="festival_technologies">
            <div class="festival_technology_block">
                <div class="festival_technology">
                    @php
                        $count = 0;
                        foreach($festival->applications as $app) {
                            if($app->technology_id == null && $app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена' && $app->member_status_id != 1) {
                                $count++;
                            }
                        }
                    @endphp
                    <span>Другое @if($count > 0)<span class="bold_text">({{$count}})</span>@endif</span>
                    @if($count > 0)<img src="{{asset('img/icons/arrow-down.png')}}" alt="arrow_down">@endif
                </div>
                <div class="festival_apps">
                    @foreach($festival->applications->sortBy('name') as $app)
                        @if($app->technology_id == null && $app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена' && $app->member_status_id != 1)
                            <div><a href="{{url('application/'.$app->id)}}">{{$app->name}}</a></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @foreach($festival->technologies->sortBy('name') as $technology)
            <div class="festival_technologies">
                <div class="festival_technology_block">
                    <div class="festival_technology">
                        @php
                            $count = 0;
                            foreach($festival->applications as $app) {
                                if($app->technology_id == $technology->id && $app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена' && $app->member_status_id != 1) {
                                    $count++;
                                }
                            }
                        @endphp
                        <span>{{$technology->name}} @if($count > 0)<span class="bold_text">({{$count}})</span>@endif</span>
                        @if($count > 0)<img src="{{asset('img/icons/arrow-down.png')}}" alt="arrow_down">@endif
                    </div>
                    <div class="festival_apps">
                        @foreach($festival->applications->sortBy('name') as $app)
                            @if($app->technology_id == $technology->id && $app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена' && $app->member_status_id != 1)
                                <div><a href="{{url('application/'.$app->id)}}">{{$app->name}}</a></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
