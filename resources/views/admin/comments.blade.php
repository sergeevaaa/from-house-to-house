@extends('layouts.admin')

@section('title')
    Комментарии — Панель администратора
@endsection

@section('content')
    <h2>Управление комментариями</h2>
    <div class="comments admin_block">
        @foreach($comments as $comment)
            <div class="comment_block">
                <div class="comment_top_info">
                    <div class="comment_links">
                        <a href="{{url('festivals/'.$comment->application->festival->id)}}">{{$comment->application->festival->name}}</a> / <a href="{{url('application/'.$comment->application->id)}}">{{$comment->application->name}}</a>
                    </div>
                    <form action="{{url('admin/comments/'.$comment->id.'/delete')}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="image_btn action_btn form_confirm_button"><img src="{{asset('img/icons/delete.png')}}" alt="Изменить" title="Удалить"></button>
                        <dialog open class="d_none">
                            <h2>Вы уверены?</h2>
                            <p>Вы действительно хотите выполнить это действие?</p>
                            <div class="dialog_buttons">
                                <button type="submit" class="btn form_btn dialog_accept_btn">Да</button>
                                <button type="button" class="btn dialog_cancel_btn">Отмена</button>
                            </div>
                        </dialog>
                    </form>
                </div>
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
            </div>
        @endforeach
    </div>
@endsection
