<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlist';


    public function chansons() {
        
        return $this->belongsToMany('App\Chanson', 'contient', 'playlist_id', 'chanson_id');
        // SELECT * FROM chanson JOIN contient on chanson.id=chanson_id WHERE playlist_id=$this->id
    }
    
    public function utilisateur() {
        return $this->belongsTo("App\User", "user_id");
    }
    
    public function haveMusic($idp){
        $playlist = Playlist::find($idp);
        $exists = $playlist->chansons()->exists();
        
        //var_dump($exists);
        //die();
        
        return $exists;
        
    }
    
}
