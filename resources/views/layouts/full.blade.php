<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{secure_asset('css/toastr.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icon/style.css') }}" rel="stylesheet">



</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <ul>
            <a class="navbar-brand" href="{{url('/')}}">TinyCloud</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}" data-pjax>Feeds</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}/playlistview" data-pjax>Playlist</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}/nouvelle" data-pjax>Ajoutez une chanson</a>
            </li>
            <li class="nav-link"> Bonjour {{ Auth::user()->name }}</li>
            <li class="nav-link"><a href="{{ route('logout') }}" onclick="event.preventDefault();

               document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endauth @guest
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Feed<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-link">
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-link">
                <a href="{{ route('register') }}">Register</a>
            </li>
            @endguest
        </ul>
    </nav>

    <form id="search" class=" form-inline my-2 my-lg-0">
        <input type="search" class=" form-control mr-sm-2" name="search" required placeholder="Votre recherche" />
        <button class="btn btnCyan my-2 my-sm-0 btn-ci" type="submit" data-pjax>Search <span class="icon-search"></span></button>
    </form>


    <div class=" sidebar sidebar-left shadow">
        <div class="sidebar-nav">
            {{--
            <h3>
                </span> Suggestion</h3>
            <ul>
                <li>
                    <p>Elouan Salmon</p>
                    <a href="#" class="btn btnCyan">Suivre</a>
                </li>
            </ul> --}} @yield('sidebarLeft')
        </div>
    </div>

    <div class=" sidebar sidebar-right shadow">

    </div>

    <div class="main container">
        <div class="row">
            @yield('content')
        </div>
    </div>


    <footer class="footerFix container-fluid fixed-bottom shadow-lg">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 shadow-lg">
                                <audio id="audio" class="lecteur-son" controls data-titre="Groove" data-auteur="Auteur inconnu" data-illustration="TR-153.jpg">
                                <source src="" type="audio/mp3">
                            </audio>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="{{ secure_asset('js/player.js') }}"></script>
    <script src="{{ secure_asset('js/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>

</html>
