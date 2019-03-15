<ul>
@foreach($chansons as $c)
    <li>
        <a href="#" class="chanson" data-file="{{$c->fichier}}" >{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a>, Le {{$c->utilisateur->created_at}}
        @auth
            <a href="/addtoplaylist/{{$c->id}}">Ajouter à ma playlist</a>
            <br>
            <a href="#" class="like">like</a>
            <br>
            <a href="#" class="like">dislike</a>
        @endauth
    </li>
@endforeach
</ul>