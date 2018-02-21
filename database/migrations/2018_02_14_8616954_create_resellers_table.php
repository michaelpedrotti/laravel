<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResellersTable extends Migration {

	public function up() {
		Schema::create('resellers', function (Blueprint $table) {
			$table->increments("id");
			$table->integer("user_id")->unsigned();
			$table->integer("distributor_id")->unsigned();
			$table->string("cnpj", 45);
			$table->string("razao_social", 255)->nullable();
			$table->string("inscricao_estadual", 255)->nullable();
			$table->timestamps();
			$table->softDeletes();
			
			$table->unique("cnpj", "uk_resellers");
			
			$table->foreign('distributor_id')
				->references('id')
					->on('distributors')
						->onDelete('cascade');
			
			$table->foreign('user_id')
				->references('id')
					->on('users')
						->onDelete('cascade');
		});

		//app(ResellersSeeder::class);
	}

	public function down() {
		Schema::drop('resellers');
	}

}
