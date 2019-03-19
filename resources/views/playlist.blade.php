@extends('layouts.app')

@section('content')
<div class="feed col-12">
    @foreach($playlist as $p)
    <div class="playlist col-12">
        <h2><span class="icon-music"></span> Playlist : {{$p->nom}} <a href="removeplaylist/{{$p->id}}" class=" btn btn-danger btn-sm"
                data-pjax>X</a></h2>
        @include("_chansons", ["chansons"=>$p->chansons])
        @endforeach
    </div>
</div>
@endsection
