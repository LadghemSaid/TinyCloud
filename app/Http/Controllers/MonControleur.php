<?php

namespace App\Http\Controllers;

use App\Chanson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonControleur extends Controller
{
    public function index() {
        $chansons = Chanson::all();
        return view("index", ['chansons' => $chansons]);
    }

    public function utilisateur($id) {
        $utilisateur = User::find($id);
        $me = User::find(Auth::id());

        if(!$utilisateur){
            return abort(404);
        }else{
            if($utilisateur->id == Auth::id()){
                return view("Myprofile", ['utilisateur' => $me]);
            }else{
                return view("utilisateur", ['utilisateur' => $utilisateur]);
            }
        }
    }
    
    public function suivre($id){
        $utilisateur = User::find($id);
        if(!$utilisateur){
            return abort(404);
        }
        $utilisateur->ilsMeSuivent()->toggle(Auth::id());
        return back();

    }




}
