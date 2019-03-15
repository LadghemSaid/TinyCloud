@extends('layouts.app')

@section('content')
    <form action="/creerplaylist" method="POST">
        <input type="text" name="nom" placeholder="Nom de la playlist"/>
        <input type="submit" value="Submit"/>
        {{csrf_field()}}
    </form>
@endsection