@extends('layouts.main')

@section('description')
    Примите участие в Фестивале "Калейдоскоп педагогических технологий". Бесплатное участие в фестивале. Загружайте свои видео через сервис RuTube.
@endsection

@section('keywords')
    Калейдоскоп педагогических технологий, Фестиваль педагогических технологий, Фестиваль
@endsection

@section('title')
    Фестиваль педагогических технологий
@endsection

@section('content')
    <h2>О фестивале</h2>
    <div class="info_block_1" style="display:flex; flex-direction:row;">
    <div class="info_block">
        @php
            echo $data['mainInfo'];
        @endphp
    </div>
   
    </div>
    <div class="info_block">
        <div class="link_to_container">
            <a href="{{asset('storage/files/'.$data['file'])}}" target="_blank" rel="noopener noreferrer" class="link_to">
                <span>
                    <img src="{{asset('img/icons/link.svg')}}" alt="download">
                    Скачать положение
                </span>
            </a>
        </div>
        <h2>Участники фестиваля этого года</h2>
            <div class="primers">
                
            @foreach($applications as $app)
                    @if($app->festival->end >= date('Y-m-d'))
                        @if(@isset($app->video))
                        <div class="block_primer">
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

                            <div class="app_video_primer">
                                <iframe type="text/html" style="width: 100%; height: 100%" src="{{$player_src}}" frameborder="0" allowfullscreen"></iframe>
                            </div>
                            <p class="app_link"><a href="{{url('application/'.$app->id)}}">{{$app->name}}</a></p>

                        </div>
                        @endif
                    @endif
                @endforeach
        </div>
    </div>
@endsection
