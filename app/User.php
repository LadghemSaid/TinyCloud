<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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



    public function chansons() {
        return $this->hasMany('App\Chanson', 'utilisateur_id');
        // SELECT * from chason where utilisateur_id = $this->id
    }
    

    public function ilsMeSuivent() {
        return $this->belongsToMany("App\User", "suit", "suivi_id", "suiveur_id");
    }


    public function jeLesSuit() {
        return $this->belongsToMany("App\User", "suit", "suiveur_id", "suivi_id");
    }
<<<<<<< HEAD

    //ajouté par elouan 
    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'App.User.' . $this->id;
=======
    
    public function roles()
    {
    return $this->belongsToMany('App\Role');
    }
 
    public function role_users()
    {
    return $this->hasMany('App\RoleUser');
    }
    public function likes(){
        return $this ->hasMany('App\like');
>>>>>>> a1dd87b0d9c09d976250b6d91c24544a5bc93334
    }
}


