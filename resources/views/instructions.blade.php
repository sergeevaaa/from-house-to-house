@extends('layouts.main')

@section('title')
    Помощь — Фестиваль
@endsection

@section('description')
    Инструкция пользователя. Помощь участникам Фестиваля. Свяжитесь с нами, если у вас есть впоросы. Скачать инструкцию пользователя.
@endsection

@section('keywords')
    Инструкция пользователя фестиваля, контакты организаторов
@endsection

@section('content')
    <h2>Инструкция пользователя</h2>
    <div class="info_block">
        @php
            echo $data['instruction'];
        @endphp
        <div class="link_to_container">
            <a href="{{asset('storage/files/'.$data['instruction_file'])}}" target="_blank" rel="noopener noreferrer" class="link_to">
            <span>
                <img src="{{asset('img/icons/link.svg')}}" alt="link">
                Инструкция пользователя
            </span>
            </a>
        </div>
    </div>
    <h2>Связаться с нами</h2>
    <div class="info_block">
        @php
            echo $data['help'];
        @endphp
    </div>
@endsection
