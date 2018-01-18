<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseTypesTable extends Migration {

    public function up() {
        Schema::create('license_types', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name", 150);

        $table->timestamps();        $table->softDeletes();        
    }

    public function down() {
        Schema::drop('license_types');
    }
}