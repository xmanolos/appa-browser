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
@stop

@section('content')
    @include('layout.header')

    <div class="full-panel">
        <div class="panel-tree">
            <div class="schema-part row">
                <div class="col tfd panel-field" style="width: 100%;">
                    <select id="schemas" name="schemas" required="true"></select>
                    <span>Schemas</span>
                </div>
            </div>
            <div class="filter-part row">
                <div class="col tfd panel-field" style="width: 100%;">
                    <input id="search" name="search" type="text" placeholder=" " />
                    <span>Search</span>
                </div>
            </div>
            <div class="tree-part">
                <div class="panel-tables-tree">
                    <ul id="tables-tree"></ul>
                </div>
                <div class="panel-tables-tree">
                    <ul id="views-tree"></ul>
                </div>
            </div>
        </div>
        <div class="panel-fill">
            <div class="panel-query">
                <div class="btn-change-style-query">
                    <i class="la la-gears"></i>
                    <div class="style-query-editor">
                        <div class="col tfd panel-field" style="width: 100%;">
                            <select id="styleQueryEditor" name="styleQueryEditor" required="true">
                                <option value="xcode">X-Code</option>
                                <option value="textmate">Textmate</option>
                                <option selected value="sqlserver">SQL Server</option>
                                <option value="eclipse">Eclipse</option>
                                <option value="github">Github</option>
                                <option value="terminal">Terminal</option>
                                <option value="tomorrow">Tomorrow</option>
                                <option value="tomorrow_night">Tomorrow Night</option>
                                <option value="vibrant_ink">Vibrant</option>
                            </select>
                            <span>Editor style</span>
                        </div>
                    </div>
                </div>
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
    <script type="text/javascript" src="{{ asset('js/custom/driver-icon.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/query-runner.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/grid-builder.js') }}"></script>
@stop
