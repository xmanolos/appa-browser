@extends('master')

@section('title', 'Home')

@section('custom-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/views/home.css') }}">
@stop

@section('content')
    <div class="full-panel">
        <div class="panel-tree">
            <div class="schema-part row">
                <div class="col tfd panel-field" style="width: 100%;">
                    <select name="schemas" required="true">
                        <option selected disaled hidden value=""></option>
                        <option value="1">schema 01</option>
                        <option value="2">schema 02</option>
                        <option value="3">schema 03</option>
                    </select>
                    <span>Schemas</span>
                </div>
            </div>
            <div class="filter-part row">
                <div class="col tfd panel-field" style="width: 100%;">
                    <input name="search" type="text" placeholder=" " required="true"/>
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
        <div class="panel-show">
        </div>
    </div>
@stop

@section('custom-js')
    <script type="text/jscript" src="{{ asset('js/views/home.js') }}"></script>
@stop
