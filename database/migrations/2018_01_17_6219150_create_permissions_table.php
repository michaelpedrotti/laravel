<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

	public function up() {
		Schema::create('permissions', function (Blueprint $table) {
			$table->increments("id");
			$table->string("permission", 50);
			$table->string("desc", 255);
		});
		
		app(\PermissionsSeeder::class)->run();
	}

	public function down() {
		Schema::drop('permissions');
	}

}
