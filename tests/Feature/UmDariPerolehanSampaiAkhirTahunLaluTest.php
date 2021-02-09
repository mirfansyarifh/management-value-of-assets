<?php

namespace Tests\Feature;

use App\Models\Resources\Aktiva\Aktiva;
use App\Models\Resources\Barang\Barang;
use App\Models\Resources\Kategori\Kategori;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UmDariPerolehanSampaiAkhirTahunLaluTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample() {
        $barang = new Barang([
            'kode_registrasi' => ["N10","E05","s41","4888"],
            'properties' => [
                'nama_aset_tetap' => 'Testing Mobil Sedan',
                'type' => 'Sedan',
                'merk' => 'Honda Accord',
                'nomor' => [
                    'rangka' => 'MR053ZEE286000349',
                    'mesin' => '1ZZ4739997',
                    'polisi' => 'H 7607 EF'
                ],
                'tahun_pembuatan' => '2008'
            ],
            'status_guna' => 'guna',
            'kondisi' => 'baik',
            'kategori_id' => 4
        ]);
        $barang->save();
        $aktiva = new Aktiva([
            'nilai_perolehan' => 200000000,
            'tgl_perolehan' => Carbon::create(2018,1,1)->toDate()
        ]);
        $barang->aktiva()->save($aktiva);
        $this->assertEquals(24, $aktiva->getUmDariPerolehanSampaiAkhirTahunLalu(2020), 'Umur manfaat tidak sama');
        $this->assertEquals(7, $aktiva->getUmDariAwalTahunSampaiBulanIni(2020,7));
        $this->assertEquals(36, $aktiva->getUmDariPerolehanSampaiAkhirTahunIni(2020));

        //$this->assertEquals(50000000, $aktiva->nilai_residu);
    }
}
