<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Domain\Videos\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->words(3, true))
    ];
});
