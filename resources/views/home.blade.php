@extends('master')

@section('title', 'Home')

@section('custom-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/views/home.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
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
                    <input id="search" name="search" type="text" placeholder=" " required="true"/>
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
                <textarea class="text-query sql"></textarea>
            </div>
            <div class="panel-show-result">
                <textarea id="teste123"></textarea>
            </div>
        </div>
    </div>
@stop

@section('custom-js')
    <script type="text/javascript" src="{{ asset('js/views/home.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.2/ace.js"></script>
@stop
