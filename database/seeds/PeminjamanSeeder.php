<?php

use App\Models\Auth\User\User;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Peminjaman\Peminjaman;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //print_r(Peminjaman::all()->get('id')->pluck('id')->all() ?? '');
        auth()->loginUsingId(User::whereEmail('system@example.com')->get()->first()->id);
        User::all()->each(function ($user) {
            switch ($user->roles->first()->name) {
                case 'umum':
                    factory(Peminjaman::class, 1)->create([
                        'pemohon_id' => $user->id,
                    ])->first()->barangs()->saveMany(Barang::whereBetween('id', [1, 5])->where('status_guna', 'guna')->get()->all());
                    break;
                case 'karyawan':
                    [$peminjaman1, $peminjaman2] = factory(Peminjaman::class, 2)->create([
                        'pemohon_id' => $user->id,
                    ])->all();
                    $peminjaman1->barangs()->saveMany(Barang::whereBetween('id', [6, 10])->where('status_guna', 'guna')->get()->all());
                    $peminjaman2->barangs()->saveMany(Barang::whereBetween('id', [11, 15])->where('status_guna', 'guna')->get()->all());
                    break;
                case 'keuangan':
                    [$peminjaman1, $peminjaman2, $peminjaman3] = factory(Peminjaman::class, 3)->create([
                        'pemohon_id' => $user->id,
                    ])->all();
                    $peminjaman1->barangs()->saveMany(Barang::whereBetween('id', [16, 20])->where('status_guna', 'guna')->get()->all());
                    $peminjaman2->barangs()->saveMany(Barang::whereBetween('id', [21, 25])->where('status_guna', 'guna')->get()->all());
                    $peminjaman3->barangs()->saveMany(Barang::whereBetween('id', [26, 30])->where('status_guna', 'guna')->get()->all());
                    break;
                default:
                    break;
            }
        });
        auth()->logout();
    }
}
