<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\AdminUser::factory()
      ->create([
        'email' => "admin@mail.ru",
        'password' => bcrypt("admin"),
      ])
      ->create([
        'email' => "admin2@mail.ru",
        'password' => bcrypt("admin2"),
      ]);

      \App\Models\Status::factory()
      ->create([
        'status' => "Создан",
      ])
      ->create([
        'status' => "Обновлен",
      ])
      ->create([
        'status' => "Подтвержден",
      ])
      ->create([
        'status' => "Оформлен",
      ]);

      \App\Models\Category::factory()
      ->create([
        'category' => "Изучение английского с нуля",
      ])
      ->create([
        'category' => "Изучение немецкого с нуля",
      ])
      ->create([
        'category' => "Изучение французского с нуля",
      ])
      ->create([
        'category' => "Создание электронной музыки",
      ])
      ->create([
        'category' => "Базовый курс: Рисунок и живопись",
      ])
      ->create([
        'category' => "Линейная перспектива без линейки",
      ])
      ->create([
        'category' => "Инженер по тестированию",
      ])
      ->create([
        'category' => "Специалист по кибербезопасности",
      ])
      ->create([
        'category' => "Графический дизайнер",
      ]);
    }
}
