<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdRulesTable extends Migration {

    public function up() {
        Schema::create('upd_rules', function (Blueprint $table) {
            $table->increments("id");
            $table->string("type", 50);
            $table->string("name", 150);
            $table->text("value");
        $table->timestamps();        $table->softDeletes();        
		});	
		
		//app(UpdRulesSeeder::class);
    }

    public function down() {
        Schema::drop('upd_rules');
    }
}