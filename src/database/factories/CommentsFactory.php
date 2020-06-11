<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Company;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $arrayName = ['Название', 'ИНН', 'Общая информация', 'Генеральный директор', 'Адрес', 'Телефон','Компания целиком'];
    $arrayCompanyId = Company::select('id')->get();
    $arrayUserId = User::select('id')->get();
    return [
        'column_name' => $arrayName[array_rand($arrayName)],
        'company_id' => $arrayCompanyId[rand(0, count($arrayCompanyId) - 1)],
        'user_id' => $arrayUserId[rand(0,count($arrayUserId)-1)],
        'comment' => $faker->text(20),
        'date' => $faker->dateTime(),
    ];
});
