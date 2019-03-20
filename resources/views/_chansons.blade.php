<div class="feed bigMarginHeight col-12">
    <div class="sounds col-12">
        @foreach($chansons as $c)

        <div class="card">
            @if($c->utilisateur_id == Auth::user()->id)
            <a href="{{url('/')}}/removesong/{{$c->id}}" class="btn btn-danger btn-sm" data-pjax>X</a>
            @endif
            <div>
                <img class="card-img-top" src="{{secure_asset($c->cover)}}" alt="Card image cap">
                <div class="card-body">
                    <h5>
                        <a href="song/{{$c->id}}" class="chanson" data-file="{{$c->fichier}}">{{$c->nom}}</a>
                    </h5>
                    <h5>
                        <a href="song/{{$c->id}}" class="chanson" data-file="{{$c->fichier}}">{{$c->titre}}</a>
                    </h5>
                    <br>
                    <h6 class="text-muted">
                        <a href="/utilisateur/{{$c->utilisateur->id}}">{{$c->utilisateur->name}}</a> 
                        @if($c->utilisateur->created_at != null)
                        <i>Le {{$c->utilisateur->created_at}}</i>
                        @endif
                    </h6>
                    <br>
                    @auth

                        <div class="dropdown">
                            <button class="btnPurpleDark btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ajouter à :</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach(Auth::user()->playlists as $p)
                                
                                    @if(!$c->BelongToPlaylist($p->id,$c->id))
                                        <a class="dropdown-item btn btnPurple dropdown-item" href="/addtoplaylist/{{$p->id}}/{{$c->id}}">{{$p->nom}}</a>
                                    @else
                                        
                                        <span class="btn-group">
                                            <button class="dropdown-item btn btnPurple " disabled>{{$p->nom}}</button><a class=" dropdown-itembtn btn-danger btn-mini" href="removefromplaylist/{{$p->id}}/{{$c->id}}">X</a><br />
                                        </span> 
                                    @endif 
                                @endforeach
                                <a class="button btn btnPurple" href="/creerplaylistview">Crée une playlist</a>
                            </div>
                        </div>


            


    
                    @if($c->utilisateur_id !== Auth::user()->id)
                        <div class="card-buttons">
                            <form method="get" data-pjax>
                                <a href="#" class="btn btnPurpleDark liked"  data-pjax data-idc="{{$c->id}}">Like <span class="icon-thumbs-o-up"></span> <span id="countLike{{$c->id}}" >{{$c->likesCount}}</span></a>
                            </form>
        
                            <form method="get" data-pjax>
                                <a href="#" class="btn btnPurpleDark disliked"  data-pjax data-idc="{{$c->id}}">Dislike <span class="icon-thumbs-o-down"></span> <span id="countDislike{{$c->id}}" >{{$c->dislikesCount}}</span></a>
                            </form>
                        </div>
                    @endif
                    @endauth
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
