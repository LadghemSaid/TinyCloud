<div class="feed col-12">
        <div class="sounds col-12">
            @foreach($chansons as $c)
    
            <div class="card">
                <div>
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5>
                            <a href="song/{{$c->id}}" class="chanson" data-file="{{$c->fichier}}">
                                {{$c->nom}}
                            </a>
                        </h5>
                        <h6 class="text-muted">
                            <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a>,
                            Le {{$c->utilisateur->created_at}}
    
                        </h6>
    
                        @auth
    
                        <div class="dropdown dropdown-menu-center">
                            <button class="btnPurple btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Ajouter à :
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach(Auth::user()->playlists as $p)
    
                                @if(!$c->BelongToPlaylist($p->id,$c->id))
                                <a class=" btn btnPurple dropdown-item" href="/addtoplaylist/{{$p->id}}/{{$c->id}}">{{$p->nom}}</a>
                                @else
                                <span class="btn-group">
                                    <button class=" btn btnPurple " disabled>{{$p->nom}}</button><a class="btn btn-danger btn-mini"
                                        href="removefromplaylist/{{$p->id}}/{{$c->id}}">X</a><br />
                                </span>
                                @endif
    
                                @endforeach
                                <a class="button btn btnPurple" href="/creerplaylistview">Crée une playlist</a>
                            </div>
                        </div>
    
    
    
                        <div class="card-buttons">
                            <a href="#" class="btn btnPurpleDark">Like <span class="icon-thumbs-o-up"></span></a>
    
                            <a href="#" class="btn btnPurpleDark">Dislike <span class="icon-thumbs-o-down"></span></a>
    
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
    
            @endforeach
        </div>
    </div>
