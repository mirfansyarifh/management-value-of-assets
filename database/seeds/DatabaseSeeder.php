<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionAndRoleAndUserSeeder::class);
        // if only kategori:
        /*$this->call(KategoriSeeder::class);*/
        $this->call(KategoriAndBarangAndAktivaSeeder::class);
        $this->call(KonfigurasiSeeder::class);
        // $this->call(PeminjamanSeeder::class);
    }
}
