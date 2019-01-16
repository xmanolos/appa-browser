<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DB Browser - @yield('title')</title>

        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

        <!-- Custom -->
        <script src="{{ asset('js/custom/swal.js') }}"></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/patterns.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/components/text-fields.css') }}">
        
        @yield('custom-styles')
    </head>
    <body>
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
    </body>
</html>
