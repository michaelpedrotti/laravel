<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments("id");
			$table->string("name", 255);
			$table->string("email", 255);
			$table->string("password", 255);
			$table->string("remember_token", 100);
			$table->enum("first_login", ['Y', 'N'])->default('Y');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down() {
		Schema::drop('users');
	}
}
