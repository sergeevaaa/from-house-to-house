@extends('layouts.main')

@section('description')
    Участвовать в фестивале педагогических технологий. Подайте заявку на участие в фестивале в качестве участника или гостя.
@endsection

@section('keywords')
    Регистрация на фестиваль, Заявка на фестиваль, Участвовать в фестивале педагогических технологий.
@endsection

@section('title')
    Регистрация участников — Фестиваль
@endsection

@section('content')
    @if($festival != null)
        <h2>Регистрация участников на {{$festival->name}}</h2>
        <div class="info_block">
            <p>Уважаемые участники "Фестиваля педагогических технологий". Пожалуйста, пройдите обязательную регистрацию, заполнив следующую форму. Для заполнения заявки потребуется наличие аккаунта в системе. Если у вас еще нет аккаунта, пожалуйста, <a href="{{url('reg')}}" class="text_mail">зарегистрируйтесь</a>.</p>
            <p>Форма зявки появится только после <a href="{{url('auth')}}" class="text_mail">авторизации в аккаунте</a>.</p>
        </div>
        @auth
            @if($festival->deadline > date('Y-m-d'))
                <div class="registration_block">
                    <form action="{{url('registration/'.$festival->id)}}" method="post">
                        @csrf
                        <div class="reg_element">
                            <p>Выберите статус для участия в Фестивале <span class="att_text">*</span></p>
                            <div class="radio_input">
                                <input type="radio" name="member_status" value="1" class="member_check">
                                <span>Гость</span>
                            </div>
                            <div class="radio_input">
                                <input type="radio" name="member_status" value="2" class="member_check" checked>
                                <span>Участник</span>
                            </div>
                        </div>
                        <div class="reg_element">
                            <p>Ф.И.О. участника фестиваля (полностью) <span class="att_text">*</span></p>
                            <input type="text" name="name" placeholder="Ответ" required>
                        </div>
                        <div class="reg_element member_element">
                            <p>Педагогическая технология, которая будет представлена на мастер-классе <span class="att_text">*</span></p>
                            <select name="technology_id" id="technology_id_select" required>
                                <option value="none" selected disabled>Выбрать</option>
                                @foreach($festival->technologies as $technology)
                                    <option value="{{$technology->id}}">{{$technology->name}}</option>
                                @endforeach
                                <option value="none">Другое</option>
                            </select>
                            <input type="text" name="technology" class="d_none" placeholder="Другое">
                        </div>
                        <div class="reg_element member_element">
                            <p>Ссылка на видеоматериал <span class="att_text">*</span></p>
                            <p class="note">Видеоматериал должен быть размещен на сайте RuTube. Сссылка должна иметь формат "https://rutube.ru/video/..." или "https://rutube.ru/video/private/..."</p>
                            <input type="text" name="video" placeholder="Ответ" required>
                        </div>
                        <div class="reg_element">
                            <p>Сокращенное наименование образовательной организации (в соответствии с Уставом) <span class="att_text">*</span></p>
                            <input type="text" name="organization" placeholder="Ответ" required>
                        </div>
                        <span class="red_note" style="width: 100%; margin-bottom: 10px">* Обязательные для заполнение поля</span>
                        <button type="submit" class="btn form_btn main_btn">Отправить</button>
                    </form>
                </div>
            @elseif($festival->deadline_members > date('Y-m-d'))
                <div class="registration_block">
                    <form action="{{url('registration/'.$festival->id)}}" method="post">
                        @csrf
                        <div class="reg_element">
                            <p>Срок подачи заявки для участников Фестиваля истек. Заявки принимаются только для гостей.</p>
                            <div class="radio_input">
                                <input type="radio" name="member_status" value="1" class="member_check" checked>
                                <span>Гость</span>
                            </div>
                        </div>
                        <div class="reg_element">
                            <p>Ф.И.О. участника фестиваля (полностью) <span class="att_text">*</span></p>
                            <input type="text" name="name" placeholder="Ответ" required>
                        </div>
                        <div class="reg_element">
                            <p>Сокращенное наименование образовательной организации (в соответствии с Уставом) <span class="att_text">*</span></p>
                            <input type="text" name="organization" placeholder="Ответ" required>
                        </div>
                        <span class="red_note" style="width: 100%; margin-bottom: 10px">* Обязательные для заполнение поля</span>
                        <button type="submit" class="btn form_btn main_btn">Отправить</button>
                    </form>
                </div>
            @else
                <div class="error_info">
                    <p>Заявки больше не принимаются</p>
                    <span>Срок подачи заявок на текущий фестиваль истек</span>
                </div>
            @endif
        @endauth
    @else
        Фестиваль не обнаружен
    @endif
@endsection
