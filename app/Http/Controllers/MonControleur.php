<?php

namespace App\Http\Controllers;

use App\Chanson;
use App\Playlist;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonControleur extends Controller
{
    public function index() {
        
        $chansons = Chanson::all();
        
        if (Auth::check())
        {
            $me = Auth::id();
            return view("index", ['chansons' => $chansons, 'me' => $me ]);
 
        }else{
            
            return view("index", ['chansons' => $chansons]);
        }
        
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
        if( !$utilisateur){
            return redirect ('/')->with('toastr',['statut'=>'error','message'=>'probleme']);
        }
        $utilisateur->ilsMeSuivent()->toggle(Auth::id());
        return back()->with('toastr', ['statut' => 'success', 'message' => 'suivi modifié'] );

    }
    
    
    public function AddToPlaylist($idp,$idc){
        
        $p = Playlist::find($idp);
        if($p == false || $p->user_id != Auth::id())
            abort(403);
        $p->chansons()->syncWithoutDetaching($idc);
       return back();
    }
    
    
    public function CreePlaylistView(){
     return view("creeplaylistform");
    }
    
    
    public function CreePlaylist(Request $request){
    
        
     if($request->input("nom") != " " && $request->input("nom") != null ){
            $c = new Playlist();
            $c->nom = $request->input("nom");
            $c->user_id = Auth::id();
            $c->save();
        }
        return redirect("/");
    }
    
    public function recherche($s){
        $users = User::whereRaw("name LIKE CONCAT(?,'%')",[$s])->get();

        $chansons = Chanson::whereRaw("nom LIKE CONCAT(?,'%')",[$s])->get();
        return view("recherche",['utilisateurs'=>$users, 'chansons'=>$chansons]);

    }
    public function nouvelle(){
      
        return view("nouvelle");

    }
    public function SongView($id){
        $chansons = Chanson::find($id);
        return view("songview", ['chanson' => $chansons]);

    }
    
    public function Creer(Request $request){
        if($request->hasFile("chanson") && $request->file("chanson")->isValid()){
            $c = new Chanson();
            $c->nom = $request->input("nom");
            $c->style = $request->input("style");
            $c->utilisateur_id = Auth::id();
            
            $c->fichier = $request->file("chanson")->store("public/chansons/" .Auth::id());
            $ext = $request->file("chanson")->extension();
           
            if($ext =='mpga'){
                //$request->file("chanson")->extension() = "mp3";
            };
            $c->fichier = str_replace("public/","storage/",$c->fichier);
            $c->save();
            
        }
        return redirect("/");

    }
    public function testajax(){
        return redirect('/recherche/ut');
    }




}
