<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductLicensesTable extends Migration {

    public function up() {

        Schema::create('product_licenses', function (Blueprint $table) {
			
            $table->increments("id");
            $table->integer("product_id")->unsigned();
            $table->string("filename", 255);
            $table->string("mimetype", 255);
            $table->integer("size")->unsigned();
            $table->string("extension", 45);
            $table->string("hash", 255);
			$table->enum("status", ['S', 'A', 'R', 'G'])->default('S');
			$table->timestamps();        
			$table->softDeletes();      
			
			$table->unique('product_id', 'uk_productlicenses');
			
			$table->foreign('product_id', 'fk_productlicenses_products')
				->references('id')
					->on('products')
						->onDelete('cascade');
		});	
		
		//app(ProductLicensesSeeder::class);
    }

    public function down() {
		
        Schema::drop('product_licenses');
    }
}