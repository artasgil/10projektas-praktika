<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\Type;

use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->name(),
        'description' => $faker->paragraph(3),
        'logo' => $faker->imageUrl(640,480,'cats'),
        'start_date' =>$faker->date(),
        'end_date' => $faker->date(),
        'owner_id' => rand(1,10),
        'type_id' => rand(1,4)
    ];
});
