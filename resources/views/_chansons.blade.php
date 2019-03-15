<ul>
@foreach($chansons as $c)
    <li>
        <a href="song/{{$c->id}}" class="chanson" data-file="{{$c->fichier}}" >{{$c->nom}}</a> écrite par <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a>, Le {{$c->utilisateur->created_at}}
        
       
        @auth

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ajouter à :
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           @foreach(Auth::user()->playlists as $p)
                @foreach($p->chansons as $pc)
                    @if($pc->id == $c->id)
                        <button class=" btn btn-primary" href="/addtoplaylist/{{$p->id}}/{{$c->id}}">{{$p->nom}}</button><br/>
                    @else
                        <span class="btn-group">
                            <button class=" btn btn-secondary " href="/addtoplaylist/{{$p->id}}/{{$c->id}}" disabled>{{$p->nom}}</button><button class="btn btn-danger btn-mini" href="#">X</button><br/>
                        </span>
                
                    @endif
                @endforeach
          @endforeach
         
            <a class="dropdown-item active" href="/creerplaylistview">Crée une playlist</a>
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