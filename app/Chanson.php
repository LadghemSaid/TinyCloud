<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use Laravelista\Comments\Commentable;

use Cog\Likeable\Contracts\Likeable as LikeableContract;
use Cog\Likeable\Traits\Likeable;

class Chanson extends Model implements LikeableContract
{
    use Commentable;
    use Likeable;
    
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

    
    public function playlists() {
        return $this->belongsToMany('App\Playlist', 'contient', 'chanson_id', 'playlist_id');
        // SELECT * FROM chanson JOIN contient on chanson.id=chanson_id WHERE playlist_id=$this->id
    }
 
}
