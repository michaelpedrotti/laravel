<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfile extends Migration {

    public function up() {
        
        Schema::create('profile', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name", 255);
            $table->string("uid", 45)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        
        //app(\ProfileSeeder::class)->run();
    }

    public function down() {
        Schema::drop('profile');
    }
}
