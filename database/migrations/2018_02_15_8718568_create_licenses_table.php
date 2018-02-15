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
            $table->integer("length")->unsigned();
            $table->timestamp("expiration");
            $table->string("hash", 120);
        $table->timestamps();        $table->softDeletes();        
        $table->foreign('customer_id')
            ->references('id')
                ->on('clients')
                    ->onDelete('cascade');
        $table->foreign('product_id')
            ->references('id')
                ->on('products')
                    ->onDelete('cascade');
        $table->foreign('type_id')
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