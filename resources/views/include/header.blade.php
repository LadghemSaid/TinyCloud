
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">TinyCloud</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @auth
            <li class="nav-item">
                <a class="nav-link" href="/">Feeds</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/playlistview">Playlist</a>
            </li>
            <li class="nav-link">{{ Auth::user()->name }}</li>
            <li class="nav-link"><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                    Logout
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endauth
            
            @guest
            <li class="nav-item active">
                <a class="nav-link" href="/">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-link">
                <a href="{{ route('login') }}">Connection</a>
            </li>
            <li class="nav-link">
                <a href="{{ route('register') }}">Inscription</a>
            </li>
            @endguest
        </ul>
        <form id="search" class=" form-inline my-2 my-lg-0">
            <input type="search" class=" form-control mr-sm-2" name="search" required placeholder="Votre recherche"/>
            <button class="btn btnCyan my-2 my-sm-0 btn-ci" type="submit">Rechercher <span class="icon-search"></span></button>
        </form>
      
    </div>
</nav>