<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseTypesTable extends Migration {

	public function up(){
		
		Schema::create('license_types', function (Blueprint $table) {
			
			$table->increments("id");
			$table->integer('product_id')->unsigned();
			$table->string("name", 150);
			$table->string('val')->default('0');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('product_id', 'fk_licensetypes_products')
				->references('id')
					->on('products')
						->onDelete('cascade');
		});
		
		app(LicenseTypesSeeder::class)->run();
	}

	public function down(){
		Schema::drop('license_types');
	}
}