<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Infrastructure\Videos\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->words(3, true))
    ];
});
