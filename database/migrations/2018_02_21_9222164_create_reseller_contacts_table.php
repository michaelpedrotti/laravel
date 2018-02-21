<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResellerContactsTable extends Migration {

    public function up() {
        Schema::create('reseller_contacts', function (Blueprint $table) {
            $table->increments("contact_id");
            $table->integer("reseller_id")->unsigned();
                        
        $table->foreign('contact_id')
            ->references('id')
                ->on('contacts')
                    ->onDelete('cascade');
        $table->foreign('reseller_id')
            ->references('id')
                ->on('resellers')
                    ->onDelete('cascade');
		});	
		
		//app(ResellerContactsSeeder::class);
    }

    public function down() {
        Schema::drop('reseller_contacts');
    }
}