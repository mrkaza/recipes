<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Recepie;
use App\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Recepie::class, function (Faker $faker) {
    return [
        'name' =>$faker->sentence(8, 20),
        'time' => $faker->numberBetween(20,60),
        'description'=> $faker->text(),
        'user_id' => $faker->numberBetween(1,20)
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
       'recepie_id' => $faker->numberBetween(1,100),
       'user_id' =>$faker->numberBetween(1,20),
       'comment' =>$faker->sentence(15,30)
    ];
});
