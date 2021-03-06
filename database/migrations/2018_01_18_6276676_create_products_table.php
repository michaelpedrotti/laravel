<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->increments("id");
			$table->string("name", 150);
			$table->string("version", 100);
			$table->enum("uid", ['iss', 'mli']);

			$table->timestamps();
			$table->softDeletes();
		});
		
		app(ProductsSeeder::class)->run();
	}

	public function down() {
		Schema::drop('products');
	}

}
