<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermission extends Migration {

	public function up() {
		Schema::create('permission', function (Blueprint $table) {
			$table->increments('id');
			$table->string('permission', 50);
			$table->string('description', 255);
			$table->integer('writable')->default(0);
		});

		//app(\PermissionSeeder::class)->run();
	}

	public function down() {
		Schema::drop('permissoes');
	}
}