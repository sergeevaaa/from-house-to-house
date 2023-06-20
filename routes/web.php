<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\XMLController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicationController;



//Главные страницы
Route::get('/', [XMLController::class, 'FestivalDataLoad']);
Route::get('help', [XMLController::class, 'HelpDataLoad']);


Route::get('registration', [ApplicationController::class, 'index']);
Route::get('members', [HomeController::class, 'members']);
Route::get('sitemap', [HomeController::class, 'sitemapPage']);

//Фестивали
Route::get('festivals', [FestivalController::class, 'all']);
Route::get('festivals/{id}', [FestivalController::class, 'show']);
Route::get('festivals/{id}/applications', [FestivalController::class, 'applications']);

//Просмотр заявки
Route::get('application/{id}', [ApplicationController::class, 'show']);
Route::post('application/{id}', [CommentController::class, 'store']);


//Только для гостей (авторизация + регистрация)
Route::group(['middleware' => 'guest'], function () {

    Route::get('auth', function () { return view('auth.auth');})->name('log');
    Route::get('auth/reset', function () { return view('auth.reset');});
    Route::post('auth/reset', [HomeController::class, 'resetPass']);
    Route::get('reg', function () { return view('auth.reg');});
    Route::post('reg', [HomeController::class, 'register'])->name('reg');

});

//Только для авторизированных пользователей
Route::group(['middleware' => 'auth'], function () {

    Route::post('registration/{festival_id}', [ApplicationController::class, 'create']); //Подача заявки

    //Личный кабинет
    Route::get('account', [HomeController::class, 'index']);
    Route::post('account/change_name', [HomeController::class, 'change_name']); //Изменение имени
    Route::post('account/change_photo', [HomeController::class, 'change_photo']); //Изменение фото
    Route::get('account/app/{id}/cancel', [ApplicationController::class, 'cancel']); //Отмена заявки
    Route::get('account/app/{id}/reset', [ApplicationController::class, 'reset']); //Подать снова


    //Панель администратора
    Route::group(['middleware' => 'admin'], function () {

        //Управление информацией о фестивале
        Route::get('admin/about', [XMLController::class, 'show']);
        Route::post('admin/about/info', [XMLController::class, 'store']);
        Route::post('admin/about/change_file', [XMLController::class, 'change_file']);
        Route::post('admin/about/change_file_instruction', [XMLController::class, 'change_file_instruction']);
        Route::post('admin/about/reset', [XMLController::class, 'resetFestivalXML']);

        //Управление фестивалями
        Route::get('admin/festivals', [FestivalController::class, 'index']);
        Route::get('admin/festival/add', [FestivalController::class, 'create']);
        Route::post('admin/festival/add', [FestivalController::class, 'store']);
        Route::get('admin/festival/{id}', [FestivalController::class, 'edit']);
        Route::post('admin/festival/{id}', [FestivalController::class, 'update']);

        //Управление технологиями
        Route::get('admin/technologies', [TechnologyController::class, 'index']);
        Route::post('admin/technologies', [TechnologyController::class, 'store']);
        Route::get('admin/technologies/{id}', [TechnologyController::class, 'edit']);
        Route::post('admin/technologies/{id}', [TechnologyController::class, 'update']);
        Route::delete('admin/technologies/{id}/delete', [TechnologyController::class, 'destroy']);

        //Управление заявками
        Route::get('admin/applications', [ApplicationController::class, 'admin']);
        Route::get('admin/application/{id}', [ApplicationController::class, 'edit']);
        Route::post('admin/application/{id}', [ApplicationController::class, 'update']);

        //Управление комметариями
        Route::get('admin/comments', [CommentController::class, 'index']);
        Route::delete('admin/comments/{id}/delete', [CommentController::class, 'destroy']);

        //Управление пользователями
        Route::get('admin/members', [HomeController::class, 'admin_members']);
        Route::get('admin/certificate/{id}', [HomeController::class, 'edit_certificate']);
        Route::post('admin/certificate_update/{id}', [HomeController::class, 'update_certificate']);
        
    });

});

//Route::get('bd', [HomeController::class, 'ArtisanCommands']);
Route::get('sitemap.xml', [HomeController::class, 'sitemap']);
Auth::routes();
