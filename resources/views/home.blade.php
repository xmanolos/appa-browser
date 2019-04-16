@extends('master')

@section('title', 'Home')

@section('custom-styles')
    <!-- View CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/views/home.css') }}">

    <!-- JSTree (By Vakata) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/jstree/dist/themes/default/style.min.css') }}" />

    <!-- JSGrid (By Tabalinas) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/jsgrid/dist/jsgrid.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/jsgrid/dist/jsgrid-theme.min.css') }}" />

    <!-- Custom (Made by Us) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/components/mini-loading.css') }}">



    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout/database-data.css') }}">
@stop

@section('content')
    <div class="ui vertical left visible sidebar menu">
        <div class="item">
            <img src="{{ asset('images/logo/face.svg') }}" style="width: 100%; height: 45px;">
        </div>

        <div name="database-data" class="database-data-panel"></div>
    </div>

    <div class="pusher">
        @include('layout.header')

        xmp
    </div>
@stop

@section('custom-js')
    <!-- View JS -->
    <script type="text/javascript" src="{{ asset('js/views/home.js') }}"></script>

    <!-- JSTree (By Vakata) -->
    <script type="text/javascript" src="{{ asset('packages/jstree/dist/jstree.min.js') }}"></script>

    <!-- JSGrid (By Tabalinas) -->
    <script type="text/javascript" src="{{ asset('packages/jsgrid/dist/jsgrid.min.js') }}"></script>

    <!-- Ace (By Ajax.org) -->
    <script type="text/javascript" src="{{ asset('packages/ace-builds/src-min/ace.js') }}"></script>

    <!-- Custom (Made by Us) -->
    <script type="text/javascript" src="{{ asset('js/custom/disconnection.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/database-data-search.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/query-runner.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/datagrid/datagrid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/query/select-result.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/database-data.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/treeview.js') }}"></script>
@stop
