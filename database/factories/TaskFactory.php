<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'project_id' => rand(1,10),
        'task' => $faker->sentence,
        'MoSCoW' => $faker->randomElement(['M', 'S', 'C', 'W']),
        'progress' => $faker->randomElement(['not started', 'doing', 'done'],)
    ];
});
