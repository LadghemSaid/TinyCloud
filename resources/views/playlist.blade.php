@extends('layouts.app')

@section('content')
   @foreach($playlist as $p)
      <h2>Playlist : {{$p->nom}} </h2>
      @include("_chansons", ["chansons"=>$p->chansons])
   @endforeach
@endsection
