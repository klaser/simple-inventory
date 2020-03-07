<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    //'room_id' => $faker->randomElement($array = array ('1','2','3')),
    return [
        'name' => $faker->company,
        'description' => $faker->paragraph,
        'image' => 'placeholder.png',
        'quantity' => $faker->randomDigit,
        'status' => $faker->randomElement($array = array ('active','inactive','hidden')),
    ];
});
