<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseAttributesTable extends Migration {

    public function up() {
        Schema::create('license_attributes', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("license_id")->unsigned();
            $table->integer("attr_id")->unsigned();
                        
        $table->foreign('license_id')
            ->references('id')
                ->on('licenses')
                    ->onDelete('cascade');
        $table->foreign('attr_id')
            ->references('id')
                ->on('product_attributes')
                    ->onDelete('cascade');
		});	
		
		//app(LicenseAttributesSeeder::class);
    }

    public function down() {
        Schema::drop('license_attributes');
    }
}