<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- favicon --}}
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    {{-- <div id="app"> --}}
        @include('layouts.auth-navbar')
        <main>
         @yield('content')
        </main>
        @include('layouts.footer')
    {{-- </div> --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>
