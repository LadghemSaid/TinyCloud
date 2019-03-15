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





    public function likes(){
        return $this ->hasMany('App\like');
    }
 
}
