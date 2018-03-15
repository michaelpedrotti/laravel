<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertsTable extends Migration {

	public function up() {

		Schema::create('alerts', function (Blueprint $table) {

			$table->increments("id");
			$table->string("title", 255);
			$table->text("msg");
		});

		//app(AlertsSeeder::class);
	}

	public function down() {
		Schema::drop('alerts');
	}
}