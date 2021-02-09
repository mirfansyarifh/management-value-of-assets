<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            // $table->json('kode_registrasi'); biar gampang dipisah aja jadi empat
            $table->char('kode_kanwil', 3);
            $table->char('kode_aset', 3);
            $table->char('kode_tanggal', 3);
            $table->char('kode_registrasi', 4);
            $table->string('nama_barang', 255); // Ada tipe barang yg ga punya nama: tanah.nama = lokasi_aset_tetap, bangunan.nama = alamat_aset_tetap
            $table->json('properties')->nullable();
            $table->enum('status_guna', array('guna', 'non_guna', 'jual', 'non_kapitalisasi'));
            $table->enum('kondisi', ['baik', 'rusak_ringan', 'rusak_berat', 'hilang']);
            $table->text('keterangan')->nullable();
            $table->boolean('keuangan_approved')->default(false);
            $table->unsignedBigInteger('kategori_id'); // kalau mau optional kasih nullable trus kasih set null di FK constraint
            $table->unsignedBigInteger('peminjaman_id')->nullable(); // peminjaman bisa memuat banyak barang, namun barang bisa saja sedang tidak dipinjam. barang hanya bisa dimiliki oleh 1 peminjaman
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
