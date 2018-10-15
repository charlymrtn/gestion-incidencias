<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--  <link href="{{asset('css/app.css')}}" rel="stylesheet">  --}}
    <link href="https://bootswatch.com/4/superhero/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        @include('layouts.navigation')

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        @include('common.menu')
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('js/moment.min.js')}}"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>

    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    @yield('scripts')
</body>
</html>
