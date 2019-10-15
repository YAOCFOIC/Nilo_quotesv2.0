<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
	
	<script src="{{'js/jquery.js'}}"> </script>
    <script src="{{'js/Moment.js'}}"> </script>
    <script src="{{'js/fullcalendar.min.js'}}"> </script>
    <link rel="stylesheet" href="{{'css/fullcalender.min.css'}}"/>
    <!-- Scripts -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--Requirement jQuery-->
    <script type="text/javascript" src="{{asset('js/jquery2.js')}}"></script>
    <script src="{{ asset('js/jquery.simple-dtpicker.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.simple-dtpicker.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
            <div class="container">

  
                      
                    
            </div>


        <main class="py-4">
            @yield('content')

        </main>
    </div>
   <script type="text/javascript" src="{{asset('js/verifi.js')}}"></script>

</body>
</html>
