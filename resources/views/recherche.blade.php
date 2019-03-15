@extends('layouts.app')

@section('content')
    <ul>
    @foreach($utilisateurs as $u)
        <li>
            <a href="/utilisateur/{{$u->id}}">{{$u->name}}</a>
        </li>
    @endforeach
    </ul>
@endsection