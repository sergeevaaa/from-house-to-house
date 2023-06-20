<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role' => '1',
                'email' => 'fest.permaviat@mail.ru',
                'name' => 'Администратор',
                'photo' => 'standard/user.png',
                'password' => Hash::make('Asdfg321')
            ],
        ]);

        DB::table('member_statuses')->insert([
            [
                'name' => 'Гость'
            ],
            [
                'name' => 'Участник'
            ]
        ]);

        DB::table('application_statuses')->insert([
            [
                'name' => 'На рассмотрении'
            ],
            [
                'name' => 'Одобрено'
            ],
            [
                'name' => 'Заявка отклонена'
            ]
        ]);

        DB::table('festivals')->insert([
            [
                'id' => '2022',
                'name' => 'Фестиваль 2022'
            ],
        ]);

        DB::table('technologies')->insert([
            [
                'name' => 'Технологии проблемного обучения'
            ],
            [
                'name' => 'Технологии проектного обучения'
            ],
            [
                'name' => 'Технологии интерактивного обучения'
            ],
            [
                'name' => 'Технологии контекстного обучения'
            ],
            [
                'name' => 'Технологии игрового обучения'
            ],
            [
                'name' => 'ТОГИС (технология обучения в глобальном информационном сообществе)'
            ],
            [
                'name' => 'Когнитивная образовательная технология (М.Е. Бершадский)'
            ],
            [
                'name' => 'ТРИЗ (технология решения изобретательских задач)'
            ],
            [
                'name' => 'Обучение в сотрудничестве (коллективная, групповая работа)'
            ],
            [
                'name' => 'Технология анализа ситуаций (или кейс-технология, метод ситуационного анализа – кейс-стади)'
            ],
            [
                'name' => 'Здоровьесберегающие образовательные (педагогические) технологии'
            ],
            [
                'name' => 'Информационно-коммуникационные технологии'
            ],
            [
                'name' => 'Технология модульного обучения'
            ]
        ]);
    }
}
