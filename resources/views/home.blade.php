@extends('master')

@section('title', 'Connect')
@section('custom-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
@stop

@section('content')
<div class="panel center-center panel-connection">
    <form id="form">
        <div class="row">
            <div class="col tfd panel-field">
                <select name="driver">
                    <option value="">Select db type</option>
                    <option value="mysql">MySQL</option>
                    <option value="postgres">PostgreSQL</option>
                </select>
            </div>
            <div class="col tfd panel-field">
                <input name="database" type="text" placeholder=" "/>
                <span>Database</span>
            </div>
        </div>
        <div class="row">
            <div class="col tfd panel-field" style="width: 70%;">
                <input name="hostname" type="text" placeholder=" "/>
                <span>Host</span>
            </div>
            <div class="col tfd panel-field" style="width: 30%;">
                <input name="port" type="text" placeholder=" "/>
                <span>Port</span>
            </div>
        </div>
        <div class="row">
            <div class="col tfd panel-field">
                <input name="username" type="text" placeholder=" "/>
                <span>Username</span>
            </div>
            <div class="col tfd panel-field">
                <input name="password" type="password" placeholder=" "/>
                <span>Password</span>
            </div>
        </div>
        <div class="row right">
            <div class="col">
                <input id="btn-test" type="button" value="Test connection" class="button" />
            </div>
            <div class="col">
                <input type="submit" value="Connect" class="button green" />
            </div>
        </div>
    </form>
</div>

@stop

@section('custom-js')
<script type="text/jscript" src="{{asset('js/test-connection.js')}}" ></script>
@stop
