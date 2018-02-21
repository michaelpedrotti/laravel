<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientContactsTable extends Migration {

    public function up() {
        Schema::create('client_contacts', function (Blueprint $table) {
            $table->increments("contact_id");
            $table->integer("client_id")->unsigned();
                        
        $table->foreign('client_id')
            ->references('id')
                ->on('clients')
                    ->onDelete('cascade');
        $table->foreign('contact_id')
            ->references('id')
                ->on('contacts')
                    ->onDelete('cascade');
		});	
		
		//app(ClientContactsSeeder::class);
    }

    public function down() {
        Schema::drop('client_contacts');
    }
}