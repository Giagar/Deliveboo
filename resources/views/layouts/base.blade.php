<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- favicon --}}
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/base.js') }}"></script>
</head>

<body>
    {{-- <div id="app"> --}}
        @include('layouts.auth-navbar')

        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.footer')
    {{-- </div> --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>
