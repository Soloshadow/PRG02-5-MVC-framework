<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'project_id' => $faker->randomElement([1, 2, 3, 4]),
        'task' => $faker->sentence,
        'MoSCoW' => $faker->randomElement(['M', 'S', 'C', 'W']),
        'progress' => $faker->randomElement(['to do', 'doing', 'done'],)
    ];
});
