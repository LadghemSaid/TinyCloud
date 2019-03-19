   <div class="col-12 glide" id="Glide">
            <div class="sounds col-12 glide__track">
                <ul class="glide__track">
                    @foreach($chansons as $c)
        
                    <li class="glide__slide">
                        <div>
                            <div>
                                <h5>
                                    <a href="song/{{$c->id}}" class="chanson" data-file="{{$c->fichier}}">
                                        {{$c->nom}}
                                    </a>
                                </h5>
                                <h6 class="text-muted">
                                    <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a>,
                                    Le {{$c->utilisateur->created_at}}
        
                                </h6>
        
                                <div class="card-buttons">
                                    @auth
        
                                    <div class="dropdown">
                                        <button class="btnPurple btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ajouter à :
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenuButton">
                                            @foreach(Auth::user()->playlists as $p)
        
                                            @if(!$c->BelongToPlaylist($p->id,$c->id))
                                            <a class=" btn btnPurple" href="/addtoplaylist/{{$p->id}}/{{$c->id}}">{{$p->nom}}</a>
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
        
        
        
        
                                    <a href="#" class="btn btnPurpleDark">Like <span class="icon-thumbs-o-up"></span></a>
        
                                    <a href="#" class="btn btnPurpleDark">Dislike <span class="icon-thumbs-o-down"></span></a>
        
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </li>
        
                    @endforeach
                </ul>
                <div class="glide">
                        <div class="glide__track" data-glide-el="track">...</div>
                      
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                          <button class="glide__bullet" data-glide-dir="=0"></button>
                          <button class="glide__bullet" data-glide-dir="=1"></button>
                          <button class="glide__bullet" data-glide-dir="=2"></button>
                        </div>
                      </div>
                      
            </div>
        </div>
        
    