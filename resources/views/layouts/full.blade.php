<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/icon/style.css') }}" rel="stylesheet">

      {{-- glide --}}
      <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">
  
</head>
<body>

@include('include.header')

<div class=" sidebar sidebar-left shadow">
        <div class="sidebar-nav">
            {{-- <h3></span> Suggestion</h3>
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
                            <audio id="audio" class="lecteur-son" controls data-titre="Groove" data-auteur="Auteur inconnu"
                                   data-illustration="TR-153.jpg">
                                <source src="" type="audio/mp3">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- Scripts -->

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="{{ asset('js/player.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

{{-- import de glide --}}

<script src="{{ asset('js/glide.js') }}"></script>

{{-- import de howler --}}
<script src="{{ asset('js/howler.js') }}"></script>

<script>
var sound = new Howl({
  src: ['sound.mp3']
});

sound.play();

</script>



</body>
</html>

