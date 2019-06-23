<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Board;
use App\Comment;
use App\Issue;
use App\Record;
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Board::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => factory(User::class)->create()->id
    ];
});

$factory->define(Record::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'board_id' => factory(Board::class)->create()->id
    ];
});

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->sentence,
        'record_id' => factory(Record::class)->create()->id,
        'user_id' => factory(User::class)->create()->id,
        'deadline' => $faker->date()
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'issue_id' => factory(Issue::class)->create()->id,
        'body' => $faker->sentence,
    ];
});