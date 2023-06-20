@extends('layouts.main')

@section('title')
    Личный кабинет — Фестиваль
@endsection

@section('content')
    <h2>Личные данные</h2>
    @if(isset($user))
        <div class="user_block">
            <div class="user_info">
                <div class="user_photo" style='background-image: url("{{asset('storage/users/'.$user->photo)}}")'></div>
                <div class="user_data">
                    <div class="user_name_block">
                        <p><b>Имя:</b></p>
                        <div class="user_name">
                            <span>{{$user->name}}</span>
                            <img src="{{asset('img/icons/edit-text.png')}}" alt="Edit" title="Изменить имя" id="edit_name" class="image_in_btn">
                        </div>
                        <form action="{{url('account/change_name')}}" class="edit_name d_none" method="post">
                            @csrf
                            <input type="text" name="new_name" value="{{$user->name}}" required>
                            <button type="submit" class="image_btn"><img src="{{asset('img/icons/save.png')}}" alt="Save" title="Сохранить" class="image_in_btn"></button>
                            <img src="{{asset('img/icons/cancel.png')}}" alt="Cancel" title="Отмена" id="edit_cancel" class="image_in_btn" style="margin-left: 10px">
                        </form>
                    </div>
                    <p><b>Email:</b> {{$user->email}}</p>
                    <label class="user_photo_btn" for="user_photo">Изменить фото</label>
                    <form action="{{url('account/change_photo')}}" class="user_file" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="user_photo" name="photo" class="d_none">
                    </form>
                </div>
            </div>
            <div class="user_actions">
                @if($user->role == 1)
                    <a href="{{url('admin/festivals')}}" class="btn form_btn">Панель администратора</a>
                @endif
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" class="btn red_btn">Выйти из аккаунта</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d_none">
                    @csrf
                </form>
            </div>
        </div>
    @endif
    <h2>Ваши заявки</h2>
    <div class="account_festivals">
        @if(count($apps) > 0)
            @foreach($apps as $app)
                @if($app->member_status_id == 2)
                   <div class="festival_block @if($app->app_status->name == 'Заявка отклонена') red_block @endif">
                       <div class="festival_head">
                           <div class="festival_name">
                               <h3>{{$app->festival->name}}</h3>
                               <span>(@isset($app->festival->start){{date("d.m.Y", strtotime($app->festival->start))}} @else??? @endisset() — @isset($app->festival->end) {{date("d.m.Y", strtotime($app->festival->end))}}@else ???@endisset())</span>
                           </div>
                           <p class="festival_status">{{$app->app_status->name}}</p>
                       </div>
                       @isset($app->note)
                           <p class="red_note">Замечание: {{$app->note}}</p>
                       @endisset
                       <p class="festival_links">
                           @if($app->app_status->name != 'На рассмотрении' && $app->app_status->name != 'Заявка отклонена')<a href="{{url('application/'.$app->id)}}" class="festival_link">Перейти</a>@endif
                           @if($app->app_status->name == 'На рассмотрении')
                               <form action="{{url('account/app/'.$app->id.'/cancel')}}">
                                   <button type="button" class="festival_link btn form_confirm_button">Отменить заявку</button>
                                   <dialog open class="d_none">
                                       <h2>Вы уверены?</h2>
                                       <p>Вы действительно хотите выполнить это действие?</p>
                                       <div class="dialog_buttons">
                                           <button type="submit" class="btn form_btn dialog_accept_btn">Да</button>
                                           <button type="button" class="btn dialog_cancel_btn">Отмена</button>
                                       </div>
                                   </dialog>
                               </form>
                           @endif
                           @if($app->app_status->name == 'Заявка отклонена')<a href="{{url('account/app/'.$app->id.'/reset')}}" class="festival_link">Подать снова</a>@endif
                       </p>
                       <div class="festival_info">
                           <p>{{$app->member_status->name}}: {{$app->name}}</p>
                           <p>Технология: @isset($app->technology_id) {{$app->technology_selected->name}} @else {{$app->technology}} @endisset</p>
                           <p>Организация: {{$app->organization}}</p>
                           <p>Видео: <a href="{{$app->video}}" class="text_mail" target="_blank" rel="noopener noreferrer">ссылка</a></p>
                       </div>
                     
                   </div>
                @else
                    <div class="festival_block @if($app->app_status->name == 'Заявка отклонена') red_block @endif">
                        <div class="festival_head">
                            <div class="festival_name">
                                <h3>{{$app->festival->name}}</h3>
                                <span>(@isset($app->festival->start){{date("d.m.Y", strtotime($app->festival->start))}} @else??? @endisset() — @isset($app->festival->end) {{date("d.m.Y", strtotime($app->festival->end))}}@else ???@endisset())</span>
                            </div>
                            <p class="festival_status">{{$app->app_status->name}}</p>
                        </div>
                        @isset($app->note)
                            <p class="red_note">Замечание: {{$app->note}}</p>
                        @endisset
                        <p class="festival_links">
                        @if($app->app_status->name == 'На рассмотрении')
                            <form action="{{url('account/app/'.$app->id.'/cancel')}}">
                                <button type="button" class="festival_link btn form_confirm_button">Отменить заявку</button>
                                <dialog open class="d_none">
                                    <h2>Вы уверены?</h2>
                                    <p>Вы действительно хотите выполнить это действие?</p>
                                    <div class="dialog_buttons">
                                        <button type="submit" class="btn form_btn dialog_accept_btn">Да</button>
                                        <button type="button" class="btn dialog_cancel_btn">Отмена</button>
                                    </div>
                                </dialog>
                            </form>
                        @endif
                        @if($app->app_status->name == 'Заявка отклонена')<a href="{{url('account/app/'.$app->id.'/reset')}}" class="festival_link">Подать снова</a>@endif
                        </p>
                        <div class="festival_info">
                            <p>{{$app->member_status->name}}: {{$app->name}}</p>
                            <p>Организация: {{$app->organization}}</p>
                           
                        </div>
                       
                    <div class="link_to_container">
                   
                   @isset($app->certificate)
                        
                            <a href="{{asset('storage/certificate/'.$app->certificate)}}" target="_blank" rel="noopener noreferrer" class="link_to">
                                <span>
                                    <img src="{{asset('img/icons/link.svg')}}" alt="download">
                                    Скачать сертефикат
                                </span>
                            </a>  @endisset   
                         </div>   
                    </div>
                @endif
            @endforeach
        @else
            <p class="info_p">Вы еще не принимали участие ни в одном фестивале. Чтобы подать заявку на участие, перейдите на страницу <a href="{{url('registration')}}" class="text_mail">регистрации участников</a>.</p>
        @endif
    </div>
@endsection
