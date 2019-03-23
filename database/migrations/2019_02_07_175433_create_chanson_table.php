<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChansonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chanson', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',255);
            $table->string('titre',255);
            $table->string("fichier", 255);
            $table->string("style", 255);
            $table->string("cover", 255)->nullable()->default("https://gwiguyana.gy/sites/default/files/default_images/placeholder.png");;
            $table->integer("utilisateur_id");
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chanson');
    }
}
