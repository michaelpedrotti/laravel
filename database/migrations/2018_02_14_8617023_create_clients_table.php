<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	public function up() {
		Schema::create('clients', function (Blueprint $table) {
			$table->increments("id");
			$table->integer("user_id")->unsigned();
			$table->integer("reseller_id")->unsigned();
			$table->string("cnpj", 45);
			$table->timestamps();
			$table->softDeletes();
			
			$table->foreign('reseller_id')
				->references('id')
					->on('resellers')
						->onDelete('cascade');
			
			$table->foreign('user_id')
				->references('id')
					->on('users')
						->onDelete('cascade');
		});

		//app(ClientsSeeder::class);
	}

	public function down() {
		Schema::drop('clients');
	}

}
