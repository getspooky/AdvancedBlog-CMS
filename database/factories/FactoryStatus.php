<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        //
        "content"=>$faker->text,
        "user_id"=>$faker->numberBetween(0,100)
    ];
});
