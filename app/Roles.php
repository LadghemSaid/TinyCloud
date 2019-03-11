<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function utilisateur() {
    return $this->belongsTo("App\User", "utilisateur_id");
    }
     public function users()
    {
    return $this->belongsToMany('App\User');
    }
 
    public function role_users()
    {
    return $this->hasMany('App\RolesUser');
    }
    
    /*
     public function up()
    {
        Schema::create('playlist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_playlist');
            $table->integer('user_id');
            $table->timestamps();
        });
    }
    */
}
