<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = ['living room', 'bedroom', 'kitchen', 'pantry', 'laundry room', 'foyer', 'bathroom']),
    ];
});
