<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

@include('sweetalert::alert')

<div id="app">
    <div id="page-container" class="sidebar-inverse side-scroll main-content-boxed">

        @include('partials._header')

        @yield('content')

        <footer id="page-footer" class="bg-white opacity-0" style="opacity: 1;">
            <div class="content py-20 font-size-xs clearfix">
                <div class="float-right">
                    Sponsored with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://www.startupdiscounts.co.uk" target="_blank">Startup Discounts Ltd</a>
                </div>
                <div class="float-left">
                    &copy; meTracker <span class="js-year-copy">2018</span>. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
