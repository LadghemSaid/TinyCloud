@extends('layouts.app')

@section('sidebarLeft')
<form class="padding" action="/creerplaylist" method="POST">
<h3>Créer une playlist</h3>
    <input type="text" name="nom" placeholder="Nom de la playlist" class="form-control margin" />

    <button type="submit" class="btn btnCyan margin">Créer</button>
    {{csrf_field()}}
</form> 
@endsection
@section('content')
<div class="feed col-12">
    @foreach($playlist as $p)
    <div class="playlist col-12">
        <h2><span class="icon-music"></span> Playlist : {{$p->nom}} <a href="removeplaylist/{{$p->id}}" class=" btn btn-danger btn-sm"
                data-pjax>X</a></h2>
        @include("_chansons", ["chansons"=>$p->chansons])
        @endforeach
    </div>
</div>
@endsection
