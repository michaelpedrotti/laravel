<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdSdfndrsTable extends Migration {

    public function up() {
        Schema::create('upd_sdfndrs', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->string("type");
            $table->text("value");
            $table->string("status");
        $table->timestamps();        $table->softDeletes();        
        $table->foreign('user_id')
            ->references('id')
                ->on('users')
                    ->onDelete('cascade');
		});	
		
		//app(UpdSdfndrsSeeder::class);
    }

    public function down() {
        Schema::drop('upd_sdfndrs');
    }
}