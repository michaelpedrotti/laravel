<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilePermission extends Migration {

	public function up() {
		Schema::create('profile_permission', function (Blueprint $table) {
			$table->increments("id");
			$table->integer("permission_id")->unsigned();
			$table->integer("profile_id")->unsigned();

			$table->foreign('profile_id')
				->references('id')
				->on('profile')
				->onDelete('cascade');

			$table->foreign('permission_id')
				->references('id')
				->on('permission')
				->onDelete('cascade');
		});


		//app(\PermissoesPerfilSeeder::class)->run();
	}

	public function down() {
		Schema::drop('profile_permission');
	}
}