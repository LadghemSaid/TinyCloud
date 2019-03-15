@extends('layouts.app')

@section('content')
    <ul>
        @foreach($chansonsAddedToPlaylist as $c)
            <li> <a href="#" class="chanson" data-file="{{$c->fichier}}" >{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a>, Le {{$c->utilisateur->created_at}}</li>
        @endforeach
    </ul>
@endsection
