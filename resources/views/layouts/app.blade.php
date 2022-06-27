<!doctype html>
<html lang="en" dir="{{env('SITE_RTL') == 'on'?'rtl':''}}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(env('SITE_RTL')=='on')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">

        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">
    @endif
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    <script>
    var toster_pos="{{env('SITE_RTL')=='on' ?'left' : 'right'}}";
</script>
<script>moment.locale('en');</script>
@stack('theme-script')
</body>
</html>
