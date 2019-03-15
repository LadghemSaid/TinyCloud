<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistTable extends Migration {
 
    public function up()
    {
        Schema::create('playlist', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom');
            $table->integer('user_id');
        });
    }
 
    public function down()
    {
        Schema::drop('playlist');
    }
}
