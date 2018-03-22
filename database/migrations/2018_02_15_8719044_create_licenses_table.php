<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration {

    public function up() {
        Schema::create('licenses', function (Blueprint $table) {
            
			$table->increments("id");
            $table->integer("product_id")->unsigned();
            $table->integer("type_id")->unsigned();
            $table->integer("customer_id")->unsigned();
            $table->integer("count")->nullable()->unsigned();
            $table->date("expiration_app")->nullable();
			$table->date("expiration_upd")->nullable();
			$table->string("zend_id", 255)->nullable();
            $table->string("hash", 120)->nullable();
			$table->enum('status', ['S','A','R','G'])->default('S');
			$table->string("verification_code", 100)->nullable();
			$table->binary('stream')->nullable();
			$table->timestamps();
			$table->softDeletes(); 

			$table->foreign('customer_id', 'fk_licenses_clients')
				->references('id')
					->on('clients')
						->onDelete('cascade');
			
			$table->foreign('product_id', 'fk_licenses_products')
				->references('id')
					->on('products')
						->onDelete('cascade');
			
			$table->foreign('type_id', 'fk_licenses_licensetypes')
				->references('id')
					->on('license_types')
						->onDelete('cascade');
		});	
		
		//app(LicensesSeeder::class);
    }

    public function down() {
        Schema::drop('licenses');
    }
}