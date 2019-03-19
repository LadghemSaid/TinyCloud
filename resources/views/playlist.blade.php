@extends('layouts.app')

@section('content')
   @foreach($playlist as $p)
      <h2>Playlist : {{$p->nom}} <a href="{{url('/')}}/removeplaylist/{{$p->id}}" class=" btn btn-danger btn-sm" data-pjax>X</a></h2>
      @include("_chansons", ["chansons"=>$p->chansons])
   @endforeach
     <form action="{{url('/')}}/creerplaylist" method="POST">
        <input type="text" name="nom" placeholder="Nom de la playlist"/>
        <input type="submit" value="Submit"/>
        {{csrf_field()}}
    </form>
@endsection
