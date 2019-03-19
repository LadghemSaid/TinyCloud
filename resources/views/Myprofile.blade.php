@extends('layouts.app')

@section('content')
    <h1>Ma Home page</h1>
    <br/>
    Je suis : {{$utilisateur->jelesSuit->count()}} personne(s)
    <br/>
    je suis suivi par : {{$utilisateur->ilsMeSuivent->count()}} personne(s)
    @auth


        @if(Auth::id() != $utilisateur->id)

            @if($utilisateur->ilsMeSuivent->contains(Auth::id()))
                <a href="{{url('/')}}/suivre/{{$utilisateur->id}}">[Arréter de suivre]</a>
            @else
                <a href="{{url('/')}}/suivre/{{$utilisateur->id}}">[Suivre]</a>
            @endif
        @endif
    @endauth
    <br/>
    @if($utilisateur->chansons)
        <h2>Mes compositions</h2>
        @include("_chansons", ["chansons" => $utilisateur->chansons])
    @endif
@endsection