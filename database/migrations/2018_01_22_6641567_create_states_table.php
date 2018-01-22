<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration {

    public function up() {
        Schema::create('states', function (Blueprint $table) {
            $table->char("id", 2);
            $table->string("name", 100);
		});
		
		app(\StatesSeeder::class)->run();
    }

    public function down() {
        Schema::drop('states');
    }
}