@extends('master')

@section('title', 'Connect')
@section('custom-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
@stop

@section('content')

<div class="center-center panel-connection">
    <div class="row">
        <div class="col-md-8 tfd panel-field" style="width: 450px;">
            <input type="text" placeholder=" "/>
            <span>Host</span>
        </div>
        <div class="col-md-4 tfd panel-field" style="width: 150px;">
            <input type="text" placeholder=" "/>
            <span>Port</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 tfd panel-field" style="width: 300px;">
            <input type="text" placeholder=" "/>
            <span>Login</span>
        </div>
        <div class="col-md-6 tfd panel-field" style="width: 300px;">
            <input type="password" placeholder=" "/>
            <span>Password</span>
        </div>
    </div>
</div>

@stop
