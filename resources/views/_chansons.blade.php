<div class="feed bigMarginHeight col-12">
    <div class="sounds col-12">
        @if(!$chansons->isEmpty())
            @foreach($chansons as $c)
    
            <div class="card">
                @auth
                        @if($c->utilisateur_id == Auth::user()->id)
                            <a href="{{url('/')}}/removesong/{{$c->id}}" class="btn btn-danger btn-sm" style="position:absolute!important;z-index:1" data-pjax>X</a>
                        @endif
                @endauth
                <div>
               
                    <img class="card-img-top" src="{{secure_asset($c->cover)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5>
                            <a href="song/{{$c->id}}" class=""  data-pjax>{{$c->nom}}</a>
                        </h5>
                        <h5>
                            <a href="song/{{$c->id}}" class=""  data-pjax>{{$c->titre}}</a>
                        </h5>
                        <h3>
                            <a  class="round-button chansonPlay" data-file="{{secure_asset($c->fichier)}}" data-played="notPlaying" data-firstime="true" ><i class="fa fa-play fa-2x"></i></a>
                            <a  class="round-button chansonPause" data-file="{{secure_asset($c->fichier)}}" data-played="notPlaying" data-firstime="true" ><i class="fa fa-pause fa-2x"></i></a>
                        </h3>
                        <br>
                        <h6 class="text-muted">
                            <a href="/utilisateur/{{$c->utilisateur->id}}" data-pjax>Ajouté par :{{$c->utilisateur->name}}</a> 
                            @if($c->utilisateur->created_at != null)
                            <br/><i>Le : {{$c->utilisateur->created_at}}</i>
                            @endif
                        </h6>
                        <br>
                        @auth
    
                            <div class="dropdown">
                                <button class="btnPurpleDark btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ajouter à :</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach(Auth::user()->playlists as $p)
                                    
                                        @if(!$c->BelongToPlaylist($p->id,$c->id))
                                            <a class="dropdown-item btn btnPurple dropdown-item" href="/addtoplaylist/{{$p->id}}/{{$c->id}}" data-pjax>{{$p->nom}}</a>
                                        @else
                                            
                                            <span class="btn-group">
                                                <button class="dropdown-item btn btnPurple " disabled>{{$p->nom}}</button><a class=" dropdown-itembtn btn-danger btn-mini" href="removefromplaylist/{{$p->id}}/{{$c->id}}" data-pjax>X</a><br />
                                            </span> 
                                        @endif 
                                    @endforeach
                                    <a class="button btn btnPurple" href="/playlistview" data-pjax>Crée une playlist</a>
                                </div>
                            </div>
                            
                        @if($c->utilisateur_id !== Auth::user()->id)
                            <div class="card-buttons">
                                <form method="get" data-pjax>
                                    <a  class="btn btnPurpleDark liked"  data-pjax data-idc="{{$c->id}}">Like <span class="icon-thumbs-o-up"></span> <span id="countLike{{$c->id}}" >{{$c->likesCount}}</span></a>
                                </form>
            
                                <form method="get" data-pjax>
                                    <a class="btn btnPurpleDark disliked"  data-pjax data-idc="{{$c->id}}">Dislike <span class="icon-thumbs-o-down"></span> <span id="countDislike{{$c->id}}" >{{$c->dislikesCount}}</span></a>
                                </form>
                            </div>
                        @endif
                        @endauth
                    </div>
    
                </div>
            </div>
            @endforeach
            
        
        @else
          <h1>Pas de chansons</h1>
        @endif
     
        
        
     
    </div>
</div>
