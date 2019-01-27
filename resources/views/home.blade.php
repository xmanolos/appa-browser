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
                    <option selected disaled hidden value=""></option>
                    
                    @foreach($availableDatabases as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
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
                <input id="btn-test-conn" type="button" value="Test connection" class="button" />
            </div>
            <div class="col">
                <input id="btn-connect" type="submit" value="Connect" class="button green" />
            </div>
        </div>
    </form>
</div>

@stop

@section('custom-js')
    <script type="text/jscript" src="{{asset('js/custom/test.js')}}"></script>
    <script type="text/jscript" src="{{asset('js/views/home.js')}}"></script>
@stop
