<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCloudDomainTable extends Migration {

    public function up() {
        Schema::create('cloud_domain', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("point")->unsigned();
            $table->string("domain", 128);
            $table->string("server", 128);
            $table->integer("port")->unsigned();
            $table->string("enabled");
            $table->integer("userId")->unsigned();

        $table->timestamps();        $table->softDeletes();        
    }

    public function down() {
        Schema::drop('cloud_domain');
    }
}