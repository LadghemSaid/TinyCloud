@extends('layouts.app')

@section('content')
    <h1>Home page de {{$utilisateur->name}}</h1>
    <br/>
    Il suit {{$utilisateur->jelesSuit->count()}} personne(s)
    <br/>
    Suivi par {{$utilisateur->ilsMeSuivent->count()}} personne(s)
    @auth


        @if(Auth::id() != $utilisateur->id)

            @if($utilisateur->ilsMeSuivent->contains(Auth::id()))
                <a href="/suivre/{{$utilisateur->id}}">[Arréter de suivre]</a>
                @else
                <a href="/suivre/{{$utilisateur->id}}">[Suivre]</a>
            @endif
        @endif
    @endauth
    <br/>
        @if($utilisateur->chansons)
            <h2>Ses compositions</h2>
            @include("_chansons", ["chansons" => $utilisateur->chansons])
        @endif
@endsection