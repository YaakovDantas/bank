<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Account;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Account::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "password" => Account::encryptPassword("1111"),
        "account_number" => $faker->unique()->numberBetween(100, 999),
        "account_code" => $faker->unique()->numberBetween(1, 99),
        "balance" => $faker->unique()->numberBetween(100, 2000),
        "agency" => $faker->unique()->numberBetween(100, 999)
    ];
});
