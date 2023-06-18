<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome6.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery-datatable.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet">

    <!-- Scripts -->
</head>
<body>
    <div id="app">
        @include('layouts.partials.header')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/font-awesome6.js')}}"></script>
    <script src="{{asset('js/tinymce.js')}}"></script>
    <script src="{{asset('js/jquery-datatable.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    @include('layouts.partials.alerts')
    @stack('scripts')
</body>
</html>
