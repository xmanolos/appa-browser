<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DB Browser - @yield('title')</title>

        <!-- SweetAlert2 (By SweetAlert2) -->
        <link rel="stylesheet" type="text/css" href="{{ asset('packages/sweetalert2/dist/sweetalert2.min.css') }}" />

        <!-- Font Awesome (By FortAwesome) -->
        <link rel="stylesheet" type="text/css" href="{{ asset('packages/font-awesome/css/font-awesome.min.css') }}" />

        <!-- Icons8 Line-Awesome (By Icons8) -->
        <link rel="stylesheet" type="text/css" href="{{ asset('packages/line-awesome2/dist/css/line-awesome.css') }}" />

        <!-- Custom (Made by Us) -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/patterns.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/text-fields.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/custom-loading.css') }}">

        @yield('custom-styles')
    </head>
    <body>
        @routes

        @section('sidebar')
        @show

        <div class="container">
            @yield('content')
        </div>

        @section('footer')
            <div class="footer">
                <span>powered by manolos<span>
            </div>
        @show

        <!-- jQuery (By jQuery) -->
        <script type="text/javascript" src="{{ asset('packages/jquery/dist/jquery.min.js') }}"></script>

        <!-- jQuery Mask Plugin (By Igor Escobar) -->
        <script type="text/javascript" src="{{ asset('packages/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>

        <!-- SweetAlert2 (By SweetAlert2) -->
        <script type="text/javascript" src="{{ asset('packages/sweetalert2/dist/sweetalert2.min.js') }}"></script>

        <!-- Custom (Made by Us) -->
        <script type="text/javascript" src="{{ asset('js/custom/api.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom/swal.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom/custom-loading.js') }}"></script>

        @yield('custom-js')
    </body>
</html>
