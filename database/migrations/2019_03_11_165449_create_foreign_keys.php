<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration {
 
    public function up()
    {
        Schema::table('role_user', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('role_user', function(Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('role_user_tag', function(Blueprint $table) {
            $table->foreign('role_user_id')->references('id')->on('role_user')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('role_user_tag', function(Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }
 
    public function down()
    {
        Schema::table('role_user', function(Blueprint $table) {
            $table->dropForeign('role_user_user_id_foreign');
        });
        Schema::table('role_user', function(Blueprint $table) {
            $table->dropForeign('role_user_role_id_foreign');
        });
        Schema::table('role_user_tag', function(Blueprint $table) {
            $table->dropForeign('role_user_tag_role_user_id_foreign');
        });
        Schema::table('role_user_tag', function(Blueprint $table) {
            $table->dropForeign('role_user_tag_tag_id_foreign');
        });
    }
}