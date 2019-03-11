<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesUserTable extends Migration {
 
    public function up()
    {
        Schema::create('role_user', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
        });
    }
 
    public function down()
    {
        Schema::drop('role_user');
    }
}