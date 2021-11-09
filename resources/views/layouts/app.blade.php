<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'hapolearn') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Import Boostrap css, js, font awesome here -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('image/icon_mess.png') }}"/>
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

    @auth()
    <script>
        var userName = '{{\Illuminate\Support\Facades\Auth::user()->name}}';
    </script>
    @endauth

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/ac80846b5c.js" crossorigin="anonymous"></script>
       
</body>
</html>
