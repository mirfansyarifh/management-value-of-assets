<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('barangs', function(Blueprint $table) {
			$table->foreign('kategori_id')->references('id')->on('kategoris')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('aktivas', function(Blueprint $table) {
            $table->foreign('barang_id')->references('id')->on('barangs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('peminjamans', function(Blueprint $table) {
            $table->foreign('pemohon_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('peminjamans', function(Blueprint $table) {
            $table->foreign('peninjau_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('barangs', function(Blueprint $table) {
            $table->foreign('peminjaman_id')->references('id')->on('peminjamans')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
        Schema::table('kategoris', function(Blueprint $table) {
            $table->foreign('parent_id', 'subcategory_parent_self')->references('id')->on('kategoris')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
	}

	public function down()
	{
		Schema::table('barangs', function(Blueprint $table) {
			$table->dropForeign('barangs_kategori_id_foreign');
		});
        Schema::table('aktivas', function(Blueprint $table) {
            $table->dropForeign('aktivas_barang_id_foreign');
        });
		Schema::table('peminjamans', function (Blueprint $table) {
            $table->dropForeign('peminjamans_pemohon_id_foreign');
        });
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->dropForeign('peminjamans_peninjau_id_foreign');
        });
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign('barangs_peminjaman_id_foreign');
        });
        Schema::table('kategoris', function (Blueprint $table) {
            $table->dropForeign('subcategory_parent_self');
        });
	}
}
