<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->LastName,
        'email' => $faker->unique()->safeEmail,
        'address'=>$faker->address,
        'mobile'=>$faker->numberBetween($min = 111111111, $max = 999999999),
        'email_verified_at' => now(),
        'password' => bcrypt('admin@123'),
        'remember_token' => str_random(10),
        
    ];
});
