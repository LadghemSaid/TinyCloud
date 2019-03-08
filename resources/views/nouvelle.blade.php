@extends('layouts.app')

@section('content')
    <form action="/creer" method="POST" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Nom de la chansons"/>
        <input type="text" name="style" placeholder="Genre de la chansons"/>
        <input type="file" name="chanson" accept="audio/mpeg3"/>
        <input type="submit" value="Submit"/>
        {{csrf_field()}}
    </form>
@endsection