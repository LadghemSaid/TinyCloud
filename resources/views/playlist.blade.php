@extends('layouts.app')

@section('content')
   @foreach($playlist as $p)
      <h2>Playlist : {{$p->nom}} <a href="removeplaylist/{{$p->id}}" class=" btn btn-danger btn-sm">X</a></h2>
      @include("_chansons", ["chansons"=>$p->chansons])
   @endforeach
@endsection
