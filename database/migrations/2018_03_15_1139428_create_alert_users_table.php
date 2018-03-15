<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertUsersTable extends Migration {

	public function up() {
		
		Schema::create('alert_users', function (Blueprint $table) {

			$table->increments("id");
			$table->integer("alert_id")->unsigned();
			$table->integer("user_id")->unsigned();
			$table->enum("readed", ['Y', 'N'])->default('N');

			$table->foreign('alert_id', 'fk_alertusers_alerts')
				->references('id')
					->on('alerts')
						->onDelete('cascade');
			
			$table->foreign('user_id', 'fk_alertusers_users')
				->references('id')
					->on('users')
						->onDelete('cascade');
		});

		//app(AlertUsersSeeder::class);
	}

	public function down() {
		Schema::drop('alert_users');
	}
}