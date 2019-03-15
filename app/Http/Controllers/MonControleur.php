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
        if( !$utilisateur){
            return redirect ('/')->with('toastr',['statut'=>'error','message'=>'probleme']);
        }
        $utilisateur->ilsMeSuivent()->toggle(Auth::id());
        return back()->with('toastr', ['statut' => 'success', 'message' => 'suivi modifié'] );

    }
    public function AddToPlaylist($id){
        $users = \App\User::with('roles')->get();
        foreach ($users as $user) {
            echo '<strong>' . $user->name . '<br></strong>';
            foreach ($user->roles as $role) {
            echo '<li>' . $role->name . '</li>';
            }
        }
        
        $users = \App\User::with('role_users.role', 'role_users.tags')->get();
 
        foreach ($users as $user) {
        echo '<strong>' . $user->name . '<br></strong>';
        foreach ($user->role_users as $role_user) {
        echo $role_user->role->name . ' :<br>';
        foreach ($role_user->tags as $tag) {
            echo '<li>' . $tag->name . '</li>';
        }
    }
    echo '<br>';
}
        
        die("ok");
      
         return view("playlist",['chansons'=>$users]);

    }
    
    public function recherche($s){
        $users = User::whereRaw("name LIKE CONCAT(?,'%')",[$s])->get();

        $chansons = Chanson::whereRaw("nom LIKE CONCAT(?,'%')",[$s])->get();
        return view("recherche",['utilisateurs'=>$users, 'chansons'=>$chansons]);

    }
    public function nouvelle(){
      
        return view("nouvelle");

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
