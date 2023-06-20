@extends('layouts.main')

@section('title')
    Фестивали
@endsection

@section('description')
    Все фестивали "Калейдоскоп педагогических технологий". Архив фестивалей. Примите участие в текущаем фестивале.
@endsection

@section('keywords')
    Фестивали, архив фестивалей, актуальный фестиваль
@endsection

@section('content')
    <h2>Главный фестиваль</h2>
    @if($festivals != null)
        <a href="{{url('festivals/'.$actual_festival->id)}}">
            <div class="actual_festival">
                <div class="festival">
                    <div class="festival_top">
                        <div class="festival_name">
                            <h3>{{$actual_festival->name}}</h3>
                            <span>(@isset($actual_festival->start){{date("d.m.Y", strtotime($actual_festival->start))}} @else??? @endisset() — @isset($actual_festival->end) {{date("d.m.Y", strtotime($actual_festival->end))}}@else ???@endisset())</span>
                        </div>
                        <div class="festival_actions">
                            @if($actual_festival->start != null && $actual_festival->end != null)
                                @php
                                    $now = time();
                                    $end_time = strtotime($actual_festival->end) - $now;
                                    $end = ceil($end_time / 60 / 60 / 24);
                                    $diff = '';
                                    if ($end < 0) {
                                        $diff = 'Завершен';
                                    }else {
                                        if ($end == 0) {
                                            $diff = "Заканчивается сегодня";
                                        }elseif ($end == 1) {
                                            $diff = "Заканчивается через $end день";
                                        }elseif ($end > 1 && $end < 5) {
                                            $diff = "Заканчивается через $end дня";
                                        }else {
                                            $diff = "Заканчивается через $end дней";
                                        }
                                    }
                                @endphp
                                <span>{{$diff}}</span>
                            @else
                                <span>Срок неопределен</span>
                            @endif
                        </div>
                    </div>
                    @php
                        $count = 0;
                        foreach ($actual_festival->applications as $app) {
                            if ($app->app_status_id == 2 && $app->member_status_id != 1) {
                                $count++;
                            }
                        }
                    @endphp
                    <span class="festival_count">Участников: {{$count}}</span>
                    <div class="festival_info info_block">
                        <p>{{$data['short']}}</p>
                    </div>
                </div>
            </div>
        </a>
        @if(count($festivals) > 0)
            <h2>Архив фестивалей</h2>
            @foreach($festivals as $festival)
                <a href="{{url('festivals/'.$festival->id)}}">
                    <div class="actual_festival archive_festivals">
                        <div class="festival">
                            <div class="festival_top">
                                <div class="festival_name">
                                    <h3>{{$festival->name}}</h3>
                                    <span>(@isset($festival->start){{date("d.m.Y", strtotime($festival->start))}} @else??? @endisset() — @isset($festival->end) {{date("d.m.Y", strtotime($festival->end))}}@else ???@endisset())</span>
                                </div>
                                <div class="festival_actions">
                                    @if($festival->start != null && $festival->end != null)
                                        @php
                                            $now = time();
                                            $end_time = strtotime($festival->end) - $now;
                                            $end = ceil($end_time / 60 / 60 / 24);
                                            $diff = '';
                                            if ($end < 0) {
                                                $diff = 'Завершен';
                                            }else {
                                                if ($end == 0) {
                                                    $diff = "Заканчивается сегодня";
                                                }elseif ($end == 1) {
                                                    $diff = "Заканчивается через $end день";
                                                }elseif ($end > 1 && $end < 5) {
                                                    $diff = "Заканчивается через $end дня";
                                                }else {
                                                    $diff = "Заканчивается через $end дней";
                                                }
                                            }
                                        @endphp
                                        <span>{{$diff}}</span>
                                    @else
                                        <span>Срок неопределен</span>
                                    @endif
                                </div>
                            </div>
                            <span class="festival_count">Участников: {{count($festival->applications)}}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    @else
        Список фестивалей пуст
    @endif
@endsection
