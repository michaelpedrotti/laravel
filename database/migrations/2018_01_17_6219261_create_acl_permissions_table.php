<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAclPermissionsTable extends Migration {

	public function up() {
		Schema::create('acl_permissions', function (Blueprint $table) {
			$table->increments("id");
			$table->integer("acl_id")->unsigned();
			$table->integer("permission_id")->unsigned();


			$table->foreign('acl_id')
				->references('id')
				->on('acls')
				->onDelete('cascade');
			$table->foreign('permission_id')
				->references('id')
				->on('permissions')
				->onDelete('cascade');
		});
	}

	public function down() {
		Schema::drop('acl_permissions');
	}

}
