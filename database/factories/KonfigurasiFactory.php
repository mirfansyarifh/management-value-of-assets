<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resources\Konfigurasi\Konfigurasi;
use Faker\Generator as Faker;

$factory->define(Konfigurasi::class, function (Faker $faker) {
    return [
        'namaweb' => $faker->company,
        'email' => $faker->email,
        'website' => 'https://'.$faker->domainName,
        'telepon' => $faker->phoneNumber,
        'alamat' => $faker->address,
        'workshop' => $faker->address,
        'facebook' => 'https://facebook.com/'.$faker->domainWord.$faker->tld,
        'instagram' => 'https://instagram.com/'.$faker->domainName,
        'deskripsi' => $faker->sentence,
        'dashboard' => $faker->word.'.jpg',
        'logo' => $faker->word.'.png',
        'icon' => $faker->word.'.png'
    ];
});
