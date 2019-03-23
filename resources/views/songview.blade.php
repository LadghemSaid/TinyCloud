@extends('layouts.app')

@section('content')
<div class="col-12">
    <div>
        <h3>{{$chanson->nom}}</h3>
        <h1>{{$chanson->titre}}</h1>
        <p><strong>[{{$chanson->style}}]</strong></p>
    </div>
    <div>
        <p>Cree par : {{$chanson->utilisateur->name}}</p>
        <br />
        <p>Le :{{$chanson->created_at}}</p>
    </div>

    <h3>Description</h3>
    <p>Lorem ipsum</p>
    @comments(['model' => $chanson])
    @endcomments

</div>
@endsection
