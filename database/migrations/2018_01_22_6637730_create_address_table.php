<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

    public function up() {
        Schema::create('address', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->char("cep", 8);
            $table->string("address", 45);
            $table->string("number", 45);
            $table->string("city", 45);
            $table->char("state", 2);
			$table->timestamps();        
			$table->softDeletes();        
			
			$table->foreign('user_id')
				->references('id')
					->on('users')
						->onDelete('cascade');
		});
		
		
		
    }

    public function down() {
        Schema::drop('address');
    }
}