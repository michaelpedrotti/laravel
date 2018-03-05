<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTypesTable extends Migration {

	public function up() {
		Schema::create('document_types', function (Blueprint $table) {
			$table->increments("id");
			$table->string("name", 45);

			$table->timestamps();
			$table->softDeletes();
		});
		
		app(\DocumentTypesSeeder::class)->run();
	}

	public function down() {
		Schema::drop('document_types');
	}

}
