<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Auth\User\User;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Peminjaman\Peminjaman;
use Faker\Generator as Faker;

$factory->define(Peminjaman::class, function (Faker $faker) {
    $endPinjam = $faker->randomDigitNotNull;
    $peninjau_id = collect([
        null,
        User::all()->filter(fn($user) => $user->hasRole('umum'))->random()->id
    ])->random();
    return [
        'peninjau_id' => $peninjau_id,
        // 'barang_id' => $faker->unique(true)->randomElement(Barang::whereStatusGuna('guna')->get('id')->pluck('id')->all()),
        'status' => is_null($peninjau_id) ? 'pending' : collect(['approved', 'ditolak'])->random(),
        'properties' => json_encode(['prop1' => $faker->sentence, 'prop2' => $faker->sentence]),
        'tgl_mulai' => date_format($faker->dateTimeBetween('now', '+'.$endPinjam.' month'), 'Y-m-d'),
        'tgl_selesai' => date_format($faker->dateTimeBetween('+'.$endPinjam.' month', '+'.$endPinjam.' month'), 'Y-m-d'),
        'keterangan' => $faker->sentence
    ];
});
