<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resources\Aktiva\Aktiva;
use Faker\Generator as Faker;

$factory->define(Aktiva::class, function (Faker $faker) {
    return [
        'nilai_perolehan' => $faker->randomFloat(2, 1000000, 100000000),
        'tgl_perolehan' => date_format($faker->dateTimeBetween('-7 months'), 'Y-m-d')
    ];
});
