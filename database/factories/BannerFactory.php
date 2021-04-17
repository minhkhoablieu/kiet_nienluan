<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->name,
        'subtitle' => $faker->name,
        'subtitle' => $faker->name,
        'image'=>'https://fakeimg.pl/1136x365/',
        'url'=>'https://vietjack.com/php/upload_file_trong_php.jsp'
    ];
});
