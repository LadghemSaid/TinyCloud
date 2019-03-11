<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesUserTagTable extends Migration {
 
    public function up()
    {
        Schema::create('role_user_tag', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('role_user_id')->unsigned();
            $table->integer('tag_id')->unsigned();
        });
    }
 
    public function down()
    {
        Schema::drop('role_user_tag');
    }
}