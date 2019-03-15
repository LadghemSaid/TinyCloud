<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Chanson extends Model  
{
    protected $table = 'chanson';

    public function utilisateur() {
        return $this->belongsTo("App\User", "utilisateur_id");
    }
<<<<<<< HEAD
}



=======
    public function likes(){
        return $this ->hasMany('App\like');
    }
    
}
>>>>>>> a1dd87b0d9c09d976250b6d91c24544a5bc93334
