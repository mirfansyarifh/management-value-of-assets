<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivasTable extends Migration {

	public function up()
	{
		Schema::create('aktivas', function(Blueprint $table) {
			$table->id('id');
			$table->decimal('nilai_perolehan', 20, 2);
            // $table->decimal('nilai_buku', 20, 2);
			$table->date('tgl_perolehan');
			$table->decimal('penurunan_nilai', 20, 2)->nullable();
			$table->boolean('umum_approved')->default(false);
			$table->boolean('keuangan_approved')->default(false);
            $table->bigInteger('barang_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('aktivas');
	}
}
