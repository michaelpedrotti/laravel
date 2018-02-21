<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorContactsTable extends Migration {

    public function up() {
        Schema::create('distributor_contacts', function (Blueprint $table) {
            $table->increments("contact_id");
            $table->integer("distributor_id")->unsigned();
                        
        $table->foreign('contact_id')
            ->references('id')
                ->on('contacts')
                    ->onDelete('cascade');
        $table->foreign('distributor_id')
            ->references('id')
                ->on('distributors')
                    ->onDelete('cascade');
		});	
		
		//app(DistributorContactsSeeder::class);
    }

    public function down() {
        Schema::drop('distributor_contacts');
    }
}