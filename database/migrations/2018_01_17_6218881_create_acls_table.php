<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAclsTable extends Migration {

	public function up() {
		Schema::create('acls', function (Blueprint $table) {
			$table->increments("id");
			$table->string("name", 100);
			$table->string("uid", 45);

			$table->timestamps();
			$table->softDeletes();
		});
		
		app(\AclsSeeder::class)->run();
	}

	public function down() {
		Schema::drop('acls');
	}
}