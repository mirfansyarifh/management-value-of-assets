<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfigurasisTable extends Migration {

	public function up()
	{
		Schema::create('konfigurasis', function(Blueprint $table) {
			$table->id();
			// $table->string('namaweb', 255);
			$table->string('email', 255)->nullable();
			$table->string('website', 255)->nullable();
			$table->string('telepon', 50)->nullable();
			$table->string('alamat', 300)->nullable();
			// $table->string('workshop', 128)->nullable();
			$table->string('facebook', 255)->nullable();
			$table->string('instagram', 255)->nullable();
			$table->text('deskripsi')->nullable();
			// $table->string('dashboard', 128)->nullable();
			$table->string('logo', 128)->nullable();
			$table->string('icon', 128)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('konfigurasis');
	}
}
