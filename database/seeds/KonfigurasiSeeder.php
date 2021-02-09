<?php

use App\Models\Resources\Konfigurasi\Konfigurasi;
use Illuminate\Database\Seeder;

class KonfigurasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Konfigurasi::class, 10)->create();
        Konfigurasi::create([
            'email' => 'care@bpjsketenagakerjaan.go.id',
            'website' => 'https://www.bpjsketenagakerjaan.go.id/',
            'telepon' => '(024) 3520279',
            'alamat' => 'RJl. Pemuda No.130, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132',
            'facebook' => 'https://www.facebook.com/bpjskinfo',
            'instagram' => 'https://www.instagram.com/bpjs.ketenagakerjaan',
            'deskripsi' => 'MELESTARIKAN MASA LALU DAN BERKEMBANG DI MASA DEPAN',
            'logo' => 'logo.png',
            'icon' => 'favicon.ico'
        ]);
    }
}
