@extends('layouts.app')

@section('content')
   <h2>Les chanosns de{{$playlist->nom}}</h2>
   @include("_chansons", ["chansons"=>$playlist->chansons])
@endsection
