<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorsTable extends Migration {

	public function up() {
		Schema::create('distributors', function (Blueprint $table) {
			$table->increments("id");
			$table->integer("user_id")->unsigned();
			$table->string("cnpj", 45);
			$table->timestamps();
			$table->softDeletes();
			
			$table->foreign('user_id')
				->references('id')
					->on('users')
						->onDelete('cascade');
		});

		//app(DistributorsSeeder::class);
	}

	public function down() {
		Schema::drop('distributors');
	}

}
