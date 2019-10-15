<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Nilo') }}</title>
    <script src="{{asset('js/jquery.js')}}"> </script>
    <script src="{{asset('js/Moment.js')}}"> </script>
    <script src="{{asset('js/fullcalendar.min.js')}}"> </script>
    <link rel="stylesheet" href="{{asset('css/fullcalender.min.css')}}"/>
    <link rel="icon" href="{{asset('images/logo2.png')}}">
    <link rel="stylesheet" href="{{asset('css/introjs.css')}}"/>
    <!-- Scripts -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--Requirement jQuery-->
    <script type="text/javascript" src="{{asset('js/jquery2.js')}}"></script>
    <script src="{{ asset('js/jquery.simple-dtpicker.js') }}"></script>
    <script src="{{asset('js/jquery.js')}}"> </script>
    <script src="{{asset('js/Moment.js')}}"> </script>
    <script src="{{asset('js/fullcalendar.min.js')}}"> </script>
    <link rel="stylesheet" href="{{asset('css/fullcalender.min.css')}}"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/style_datelimit.css')}}" rel="stylesheet">
    <link href="{{ asset('css/jquery.simple-dtpicker.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @guest
        @else
        <nav class="navbar navbar-expand-lg navbar-light border-bottom nav-primary" style="background: #6c1c82;color: white;" >
            <a href="/home" >
               <img src="{{asset('images/logo.png')}}" width="50%" data-step="1" data-intro="Aquí verás la información de las citas.">
           </a>
          
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <button type="submit" class="btn btn-primary" href="javascript:void(0);" onclick="javascript:introJs().start();">Tour</button>
                <li class="nav-item active">
                 <a href="/cancel" class="nav-link" data-step="3" data-intro="Aquí gestionarás todo lo referente a las citas para cancelar y editar el estado."> Gestionar Citas<span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item active" data-step="4" data-intro="Aquí gestionarás todo lo referente a las preguntas frecuentes que hacen los usuarios de nilo." >
                <a class="nav-link" href="/supports">Gestionar Preguntas <span class="sr-only">(current)</span></a>
            </li>
            <div class="" aria-labelledby="navbarDropdown">
                <a class="nav-link" style="color: #fff;" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sessión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      <!--   <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bienvenido {{ Auth::user()->name }} 
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li> -->
    </ul>
</div>
</nav>
@endguest
<main class="py-4">
    @yield('content')
</main>
</div>

<script src="{{asset('js/intro.js')}}"></script>

<script type="text/javascript" src="{{asset('js/verifi.js')}}"></script>
<script src='{{asset("js/main.js")}}'></script>
<script src='{{asset("js/ckeditor/ckeditor.js")}}'></script>
<script type="text/javascript">
    CKEDITOR.replace('solution');
</script>
</body>
</html>