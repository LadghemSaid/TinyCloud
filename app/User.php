<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravelista\Comments\Commenter;

class User extends Authenticatable
{
    use Notifiable, Commenter;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function chansons()
    {
        return $this->hasMany('App\Chanson', 'utilisateur_id');
        // SELECT * from chason where utilisateur_id = $this->id
    }


    public function playlists()
    {
        return $this->hasMany('App\Playlist', 'user_id');
        // SELECT * from chason where utilisateur_id = $this->id
    }

    public function ilsMeSuivent()
    {
        return $this->belongsToMany("App\User", "suit", "suivi_id", "suiveur_id");
    }


    public function jeLesSuit()
    {
        return $this->belongsToMany("App\User", "suit", "suiveur_id", "suivi_id");
    }


  


};