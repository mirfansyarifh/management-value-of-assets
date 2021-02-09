<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemohon_id');
            $table->unsignedBigInteger('peninjau_id')->nullable();
            // $table->unsignedBigInteger('barang_id');
            $table->enum('status', [
                'pending',
                'approved',
                'ditolak',
                'selesai'
            ]);
            $table->json('properties')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('keterangan', 255)->nullable();
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
        Schema::dropIfExists('peminjamans');
    }
}
