<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProfileTable extends Migration {

    public function up() {
        Schema::create('users_profile', function (Blueprint $table) {
                $table->increments("id");
                $table->integer("user_id")->unsigned();
                $table->integer("profile_id")->unsigned();
                
        $table->timestamps();
        
                         $table->foreign('profile_id')
            ->references('id')
                ->on('profile')
                    ->onDelete('cascade');

                 $table->foreign('user_id')
            ->references('id')
                ->on('users')
                    ->onDelete('cascade');

                        });
    }

    public function down() {
        Schema::drop('users_profile');
    }

}
