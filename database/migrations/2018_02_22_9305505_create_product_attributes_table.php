<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration {

    public function up() {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("product_id")->unsigned();
            $table->string("name", 255);
            $table->string("key", 255);
			$table->string('default', 255)->default('0');
                        
        $table->foreign('product_id')
            ->references('id')
                ->on('products')
                    ->onDelete('cascade');
		});	
		
		app(ProductAttributesSeeder::class)->run();
    }

    public function down() {
        Schema::drop('product_attributes');
    }
}