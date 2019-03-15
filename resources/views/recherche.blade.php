@extends('layouts.app')

@section('content')
    <ul>
    @foreach($utilisateurs as $u)
        <li>
            <a href="/utilisateur/{{$u->id}}">{{$u->name}}</a>
        </li>
    @endforeach
    </ul>

    
    <h3>Les chansons</h3>
    @include("_chansons", ['chansons'=>$chansons])

@endsection