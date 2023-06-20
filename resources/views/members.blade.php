@extends('layouts.main')

@section('description')
    Список участников и гостей фестиваля педагогических технологий. Оставляйте свои комментарии и получайте сертификат.
@endsection

@section('keywords')
    Участники фестиваля, гости фестиваля, Список участнико, Список гостей
@endsection

@section('title')
    Участники и гости — Фестиваль
@endsection

@section('content')
    <h2>Участники и гости</h2>
    <div class="members_block">
        <div class="members_nav">
            <button id="members_button" class="btn members_button active">Участники</button>
            <button id="guests_button" class="btn members_button">Гости</button>
            <!-- <div class="">
            <label for="sort">Отсортировать по</label>
                <select name="sort" id="sort">
                    <option value="festival_id"> фестивалю</option>
                    <option value="name"> алфавиту</option>
                    <option value="organization"> учебному заведению</option>
                </select>
        </div> -->
        </div>


        <div class="table_overflow">
            <table class="members_table" id="members_table">
                <tr>
                    <th>Ф.И.О.</th>
                    <th class="none">Организация</th>
                    <th>Конкурсная работа</th>
                    <th class="none">Комментариев отправлено</th>
                </tr>
                <tr>
                    <td colspan="4">Фестиваль текущий </td>
                </tr>
                @foreach($applications as $app)
                    @if($app->member_status->name == 'Участник')
                        <tr>
                            <td>{{$app->name}}</td>
                            <td class="none">{{$app->organization}}</td>
                            <td>
                                <a href="{{url('application/'.$app->id)}}">{{$app->festival->name}}</a>
                            </td>
                            <td class="none">
                                {{count($app->user->comments)}}
                            </td>
                        </tr>
                    @endif
                @endforeach
                
            </table>
            <table class="members_table d_none" id="guests_table">
                <tr>
                    <th>Ф.И.О.</th>
                    <th class="none">Организация</th>
                    <th>Фестиваль</th>
                    <th class="none">Комментариев отправлено</th>
                </tr>
                @foreach($applications->sortBy('festival_id') as $app)
                    @if($app->member_status->name == 'Гость')
                        <tr>
                            <td>{{$app->name}}</td>
                            <td class="none">{{$app->organization}}</td>
                            <td><a href="{{url('festivals/'.$app->festival->id)}}">{{$app->festival->name}}</a></td>
                            <td class="none">
                                {{count($app->user->comments)}}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection
