<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

         <!-- Pignose Calender -->
        <link href="{{asset('plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
        <!-- Chartist -->
        <link rel="stylesheet" href="{{asset('plugins/chartist/css/chartist.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
        <!-- Toast -->
        <link href="{{asset('plugins/toastr/css/toastr.min.css')}}" rel="stylesheet">
        <!-- Custom Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <!-- Preloader start -->
    <div id="preloader">
        <div class="loader">
            <img src="{{ asset('logo/logo-oh.png') }}" alt="Loading..." width="500px">
        </div>
    </div>
    <!-- Preloader end -->
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('plugins/common/common.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/settings.js')}}"></script>
    <script src="{{asset('js/gleek.js')}}"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>

    <!-- Chartjs -->
    <script src="{{asset('plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{asset('plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{asset('plugins/d3v3/index.js')}}"></script>
    <script src="{{asset('plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{asset('plugins/datamaps/datamaps.world.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{asset('plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('plugins/toastr/js/toastr.min.js')}}"></script>
    <script src="{{asset('plugins/toastr/js/toastr.init.js')}}"></script>
    </body>
</html>
