@extends('layouts.app')

@section('content')
<<<<<<< HEAD
=======
    <h3>Les utilisateurs</h3>
>>>>>>> fc43bd553e8fb3528103642be2876fe1739aacd1
    <ul>
    @foreach($utilisateurs as $u)
        <li>
            <a href="/utilisateur/{{$u->id}}">{{$u->name}}</a>
        </li>
    @endforeach
    </ul>
<<<<<<< HEAD
=======
    
    <h3>Les chansons</h3>
    @include("_chansons", ['chansons'=>$chansons])
>>>>>>> fc43bd553e8fb3528103642be2876fe1739aacd1
@endsection