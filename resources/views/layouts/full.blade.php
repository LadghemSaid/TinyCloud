<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
    <link rel="stylesheet" href="{{ secure_asset('css/toastr.css')}}">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/icon/style.css') }}" rel="stylesheet">



</head>

<body>
@include('include.header')


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
            </ul> --}} 
            
            @yield('sidebarLeft')
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
                                <audio id="audio" class="lecteur-son chanson" controls data-titre="" data-auteur="" data-illustration="">
                                <source src="" type="audio/mp3">
                            </audio>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="{{ secure_asset('js/jquery.js') }}"></script>
    <script src="{{ secure_asset('js/jquery.pjax.js') }}"></script>
    <script src="{{ secure_asset('js/player.js') }}"></script>
    <script src="{{ secure_asset('js/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ secure_asset('js/main.js') }}"></script>



</body>

</html>
