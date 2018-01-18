<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAclsTable extends Migration {

	public function up() {
		Schema::create('user_acls', function (Blueprint $table) {
			$table->increments("id");
			$table->integer("user_id")->unsigned();
			$table->integer("acl_id")->unsigned();


			$table->foreign('acl_id')
				->references('id')
				->on('acls')
				->onDelete('cascade');
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});
	}

	public function down() {
		Schema::drop('user_acls');
	}

}
