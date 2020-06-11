<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    $arrayUserId = User::select('id')->get();
    return [
        'name' => $faker->name(40),
        'inn' => $faker->unique()->numberBetween(1000000000, 900000000000),
        'information' => $faker->text(200),
        'director_id' => $arrayUserId[rand(0,count($arrayUserId)-1)],
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
    ];
});
