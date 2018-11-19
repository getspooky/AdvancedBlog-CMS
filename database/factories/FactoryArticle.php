<?php

use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
        //
        "content"=>$faker->text,
        "slug"=>strtolower($faker->text(5)),
        "title"=>$faker->text(10)
    ];
});
