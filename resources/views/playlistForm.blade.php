@extends('playlist')

@section('playlistForm')
<form action="/creerplaylist" method="POST">
    <input type="text" name="nom" placeholder="Nom de la playlist" class="form-control" />
    <br>
    <button type="submit" class="btn btnPurple">Créer</button>
    {{csrf_field()}}
</form> 
@endsection