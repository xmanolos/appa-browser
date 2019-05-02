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
@stop

@section('content')
    @include('layout.header')

    <div class="full-panel">
        <div class="panel-tree">
            <div class="tree-part">
                @include('database-data')
            </div>
        </div>
        <div class="panel-fill">
            <div class="panel-query">
                <div id="editorTextQuery" class="text-query"></div>

                <!-- Actions -->
                <div  class="panel-query-buttons">
                    <div class="button btn-format-query" title="Format query">
                        <i class="la la-code"></i>
                    </div>
                    <div id="run-query" class="button btn-run-query" title="Run query">
                        <i class="la la-play"></i>
                    </div>
                </div>

            </div>
            <div id="panel-show-result" class="panel-show-result"></div>
        </div>
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
    <script type="text/javascript" src="{{ asset('js/custom/database-data-search.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/query-runner.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/datagrid/datagrid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/query/select-result.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/custom/query/editor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/query/editor-shortcuts.js') }}"></script>
@stop
