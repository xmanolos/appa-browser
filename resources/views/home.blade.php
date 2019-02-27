@extends('master')

@section('title', 'Home')

@section('custom-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/views/home.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
@stop

@section('content')
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
                    <ul id="tables-tree">
                    </ul>
                </div>
                <div class="views-tree"></div>
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
    <script type="text/javascript" src="{{ asset('js/views/home.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom/query-runner.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.2/ace.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
@stop
