@extends('layouts.app')

@section('content')
<div class="feed col-12">
   @foreach($playlist as $p)
         <div class="sounds col-12">
               <h2><span class="icon-music"></span> {{$p->nom}} </h2>
         </div>
      @include("_chansons", ["chansons"=>$p->chansons])
   @endforeach
</div>
@endsection
