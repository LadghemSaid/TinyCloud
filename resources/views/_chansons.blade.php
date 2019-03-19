<ul>
@foreach($chansons as $c)
    <li>
        <a href="{{url('/')}}/song/{{$c->id}}" class="chanson" data-file="{{$c->fichier}}" data-pjax >{{$c->nom}}</a> écrite par <a href="{{url('/')}}/utilisateur/{{$c->utilisateur->id}}" data-pjax>{{$c->utilisateur->name}}</a> 
        @if($c->utilisateur->created_at != null)
            <p>Le {{$c->utilisateur->created_at}}</p>
        @endif
       
        @auth
        @if($c->utilisateur_id == Auth::user()->id)
            <a href="{{url('/')}}/removesong/{{$c->id}}" class="btn btn-danger btn-sm" data-pjax>X</a>
        @endif
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ajouter à :
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           @foreach(Auth::user()->playlists as $p)
              
                    @if(!$c->BelongToPlaylist($p->id,$c->id))
                        <a class=" btn btn-primary" href="{{url('/')}}/addtoplaylist/{{$p->id}}/{{$c->id}}" data-pjax>{{$p->nom}}</a>
                    @else
                        <span class="btn-group">
                            <button class=" btn btn-secondary "  disabled>{{$p->nom}}</button><a class="btn btn-danger btn-mini" href="{{url('/')}}/removefromplaylist/{{$p->id}}/{{$c->id}}" data-pjax>X</a>
                        </span>
                    @endif
              
            @endforeach
         
                         <a class="dropdown-item active" href="{{url('/')}}/playlistview" data-pjax>Crée une playlist</a>
          </div>
        </div>

            @if($c->utilisateur_id !== Auth::user()->id)
            <form  method="get" data-pjax>
                <button   class="btn btn-success btn-sm liked" data-pjax data-idc="{{$c->id}}"><i class="fas fa-thumbs-up" ></i><span id="countLike{{$c->id}}" >{{$c->likesCount}}</span></button>
            </form>
            <form  method="get" data-pjax>
                <button   class="btn btn-danger btn-sm disliked" data-pjax data-idc="{{$c->id}}"><i class="fas fa-thumbs-down" ></i><span id="countDislike{{$c->id}}" >{{$c->dislikesCount}}</span></button>
            </form>
          
            @endif
        @endauth
    </li>
@endforeach
</ul>