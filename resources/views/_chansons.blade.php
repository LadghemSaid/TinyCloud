<ul>
@foreach($chansons as $c)
    <li>
        <a href="song/{{$c->id}}" class="chanson" data-file="{{$c->fichier}}" >{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a>, Le {{$c->utilisateur->created_at}}
        
        
        @auth

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ajouter à ma playlist
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           @foreach(Auth::user()->playlists as $p)
            <a class="dropdown-item" href="/addtoplaylist/{{$p->id}}/{{$c->id}}">{{$p->nom}}</a>
          @endforeach
          </div>
        </div>

        
            <br>
            <a href="#" class="like">like</a>
            <br>
            <a href="#" class="like">dislike</a>

        @endauth
        
        
    </li>
@endforeach
</ul>