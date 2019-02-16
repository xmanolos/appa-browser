<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DB Browser - @yield('title')</title>

        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- icons8 line-awesom -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css">

        <!-- Custom (Made by Us)-->
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

        <!-- Sweet Alert -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

        <!-- jQuery -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>

        <!-- jQuery Mask Plugin (By Igor Escobar) -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.15/dist/jquery.mask.min.js"></script>

        <!-- Custom (Made by Us)-->
        <script type="text/javascript" src="{{ asset('js/custom/api.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom/swal.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom/custom-loading.js') }}"></script>

        @yield('custom-js')
    </body>
</html>
