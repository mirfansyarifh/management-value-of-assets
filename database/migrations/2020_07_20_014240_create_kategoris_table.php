<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorisTable extends Migration {

	public function up()
	{
		Schema::create('kategoris', function(Blueprint $table) {
			$table->id();
			$table->string('nama', 50);
			$table->smallInteger('masa_manfaat')->nullable();    // Kalau dia kategori parent, maka null, ex: mobil
			$table->smallInteger('persen_residu')->nullable();   // Kalau subkategori, maka tidak null, ex: sedan, non-sedan
            $table->unsignedBigInteger('parent_id')->nullable(); // Kalau kategori parent, maka null
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('kategoris');
	}
}
