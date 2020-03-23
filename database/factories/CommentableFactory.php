<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Plmrlnsnts\Commentator\Tests\Fixtures\Commentable;

$factory->define(Commentable::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
    ];
});
