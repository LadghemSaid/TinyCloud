<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Chanson extends Model  
{
    use Commentable;
    
    protected $table = 'chanson';

    public function utilisateur() {
        return $this->belongsTo("App\User", "utilisateur_id");
    }

    
    public function BelongToPlaylist($p,$cid){
        $playlist = Playlist::find($p);
        $exists = $playlist->chansons()->where('chanson.id', $cid)->exists();
        
        //var_dump($exists);
        //die();
        
        return $exists;
    }


    public function likes(){
        return $this ->hasMany('App\like');
    }
    
    public function playlists() {
        return $this->belongsToMany('App\Playlist', 'contient', 'chanson_id', 'playlist_id');
        // SELECT * FROM chanson JOIN contient on chanson.id=chanson_id WHERE playlist_id=$this->id
    }
 
}
