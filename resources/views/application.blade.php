@extends('layouts.main')

@section('title')
    {{$app->name}} — {{$app->festival->name}}
@endsection

@section('content')
    <h2><a href="{{url('festivals/'.$app->festival->id)}}">{{$app->festival->name}}</a> / <span class="regular_h">{{$app->name}}</span></h2>
    <div class="app_block">
        @php
            $video_src = $app->video;
            $video_array = explode('video/', $video_src);
            try {
                $player_array = explode('private/', $video_array[1]);
                $player_array_2 = explode('/', $player_array[1]);
                $player_src = 'https://rutube.ru/play/embed/'.$player_array_2[0];
            }catch (\Exception $e) {
                $player_src = 'https://rutube.ru/play/embed/'.$video_array[1];;
            }
        @endphp
        <div class="app_video">
            <iframe type="text/html" style="width: 100%; height: 100%" src="{{$player_src}}" frameborder="0" allowfullscreen"></iframe>
        </div>
        <div class="app_info info_block">
            @isset($app->technology_selected)
                <p>Технология: {{$app->technology_selected->name}}</p>
            @else
                <p>Технология: {{$app->technology}}</p>
            @endisset
            <p>Организация: {{$app->organization}}</p>
            <p>Дата подачи заявки: {{date("d.m.Y", strtotime($app->created_at))}}</p>
            <div class="link_to_container video_link">
                <a href="{{$app->video}}" target="_blank" rel="noopener noreferrer" class="link_to">
                    <span>
                        <img src="{{asset('img/icons/link.svg')}}" alt="">
                        Прямая ссылка
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="app_comments_block">
        <h3>Комментарии</h3>
        @if(date($app->festival->end, strtotime(date('Y-m-d').'+ 1 days')) >= date('Y-m-d',))
            @auth
                @if($app_count > 0)
                    <form action="" method="post" class="comment_form">
                        @csrf
                        <textarea name="comment" id="comment_text" placeholder="Добавить комментарий..." rows="1" required></textarea>
                        <button type="submit" class="btn form_btn">Отправить</button>
                    </form>
                @else
                    <p class="comment_alert">Чтобы добавлять комментарии, подайте заявку на участие в конкурсе в качестве участника или гостя.</p>
                @endif
            @else
                <p class="comment_alert">Чтобы добавлять комментарии, авторизуйтесь и подайте заявку на участие в фестивале в качестве участника или гостя.</p>
            @endauth
        @else
            <p class="comment_alert">Срок публикации комментариев истёк.</p>
        @endif
        <div class="app_comments">
            @foreach($comments as $comment)
                <div class="comment">
                    <div class="comment_user">
                        <div class="comment_photo" style='background-image: url("{{asset('storage/users/'.$comment->user->photo)}}")'></div>
                        <div class="comment_info">
                            <p>{{$comment->user->name}}</p>
                            <span>{{date("d.m.Y H:i:s", strtotime($comment->created_at))}}</span>
                        </div>
                    </div>
                    <div class="comment_body">
                        <p>{{$comment->comment}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
