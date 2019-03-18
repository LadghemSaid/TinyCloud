<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("playlist_id");
            $table->integer("chanson_id");
            $table->timestamps();
            $table->foreign('playlist_id')->references('id')->on('playlist')->onDelete('cascade');
            $table->foreign('chanson_id')->references('id')->on('chanson')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contient');
    }
}
