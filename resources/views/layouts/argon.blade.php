<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>CM Academy</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/LogoCM.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <!-- <link href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="{{ asset('argon') }}/css/datatables.min.css" type="text/css">
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>
    <!-- <body class="{{ $class ?? '' }}"> -->
    <body>
        
        @include('layouts.navbars.sidebar')
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>
        
        @include('sweetalert::alert')

        <!-- Argon JS -->
        @stack('js')
        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script> -->
        <!-- <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script> -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script src="{{ asset('argon') }}/js/datatables.min.js"></script>
        <script src="{{ asset('vendor') }}/sweetalert/sweetalert.all.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
       
        @yield('script')
    </body>
</html>