<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name(40),
        'inn' => $faker->unique()->numberBetween(1000000000, 900000000000),
        'information' => $faker->text(200),
        'director_name' => $faker->name(),
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
    ];
});
