<ul>
@foreach($chansons as $c)
    <li>
        <a href="song/{{$c->id}}" class="chanson" data-file="{{$c->fichier}}" >{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a> 
        @if($c->utilisateur->created_at != null)
            <p>Le {{$c->utilisateur->created_at}}</p>
        @endif
       
        @auth
        @if($c->utilisateur_id == Auth::user()->id)
            <a href="/removesong/{{$c->id}}" class="btn btn-danger btn-sm">X</a>
        @endif
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ajouter à :
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           @foreach(Auth::user()->playlists as $p)
              
                    @if(!$c->BelongToPlaylist($p->id,$c->id))
                        <a class=" btn btn-primary" href="/addtoplaylist/{{$p->id}}/{{$c->id}}">{{$p->nom}}</a>
                    @else
                        <span class="btn-group">
                            <button class=" btn btn-secondary "  disabled>{{$p->nom}}</button><a class="btn btn-danger btn-mini" href="removefromplaylist/{{$p->id}}/{{$c->id}}">X</a><br/>
                        </span>
                    @endif
              
            @endforeach
         
            <a class="dropdown-item active" href="/creerplaylistview">Crée une playlist</a>
          </div>
        </div>

            @if($c->utilisateur_id !== Auth::user()->id)
                <br>
                <a href="#" class="like btn btn-success btn-sm"><i class="fas fa-thumbs-up"></i></a>
                <br>
                <a href="#" class="like btn btn-danger btn-sm"><i class="fas fa-thumbs-down"></i></a>
            @endif
        @endauth
    </li>
@endforeach
</ul>