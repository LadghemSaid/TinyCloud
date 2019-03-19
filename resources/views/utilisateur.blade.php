@extends('layouts.app')
@section('sidebarLeft')
<h3><span class="icon-user"></span>    Abonnements</h3>
<p>Il suit {{$utilisateur->jelesSuit->count()}} personne(s)</p>
<p>Suivi par {{$utilisateur->ilsMeSuivent->count()}} personne(s)</p>

@auth
    @if(Auth::id() != $utilisateur->id)
        @if($utilisateur->ilsMeSuivent->contains(Auth::id()))
            <a class="btn btnCyan" href="/suivre/{{$utilisateur->id}}" data-pjax-toggle>Arréter de suivre</a>
            @else
            <a class="btn btnCyan" href="/suivre/{{$utilisateur->id}}" data-pjax-toggle>Suivre</a>
        @endif

    @endif
@endsection
@section('content')
<div class="col-12 userProfile">
<h1>{{$utilisateur->name}}</h1>
    @endauth
        @if($utilisateur->chansons)
            <h2>Ses compositions</h2>
            @include("_chansons", ["chansons" => $utilisateur->chansons])
        @endif
</div>
@endsection