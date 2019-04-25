<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            padding-bottom: 100px;
        }

        .level {
            display: flex;
            align-items: baseline;
        }

        .flex {
            flex: 1;
        }
    </style>
</head>
<body>
<div id="app">
    @include('layouts.nav')
    <main class="py-2">
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
