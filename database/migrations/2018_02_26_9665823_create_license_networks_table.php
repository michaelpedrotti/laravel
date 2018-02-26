<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseNetworksTable extends Migration {

    public function up() {
        Schema::create('license_networks', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("license_id")->unsigned();
            $table->string("network", 255);
                        
        $table->foreign('license_id')
            ->references('id')
                ->on('licenses')
                    ->onDelete('cascade');
		});	
		
		//app(LicenseNetworksSeeder::class);
    }

    public function down() {
        Schema::drop('license_networks');
    }
}