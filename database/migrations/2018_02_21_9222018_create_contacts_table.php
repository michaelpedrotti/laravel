<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

    public function up() {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments("id");
            $table->string("type");
            $table->string("name", 255);
            $table->string("email", 255);
        $table->timestamps();        $table->softDeletes();        
		});	
		
		//app(ContactsSeeder::class);
    }

    public function down() {
        Schema::drop('contacts');
    }
}