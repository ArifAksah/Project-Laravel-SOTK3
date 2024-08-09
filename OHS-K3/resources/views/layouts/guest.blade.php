<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('assets/vendors/feather/feather.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/typicons/typicons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">

        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/js/select.dataTables.min.css')}}">
        <!-- End plugin css for this page -->

        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center bg-light">
            <div class="w-100 max-w-md mt-4 px-4 py-5 bg-white shadow rounded">
                {{ $slot }}
            </div>
        </div>
        
    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <script src="{{asset('assets/js/settings.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    </body>
</html>
