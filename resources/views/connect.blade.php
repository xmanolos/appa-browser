@extends('master')

@section('title', 'Connect')

@section('custom-styles')
    <!-- View CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/views/connect.css') }}">
@stop

@section('content')
<div class="panel center-center panel-connection">
    <form id="form" action="{{ route('home') }}">
        <div class="row">
            <div class="col tfd panel-field" style="width: 50%;">
                <select name="driver" required="true">
                    <option selected disaled hidden value=""></option>
                    @foreach($availableDatabases as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <span>Driver</span>
            </div>
            <div class="col tfd panel-field" style="width: 50%;">
                <input name="database" type="text" placeholder=" " />
                <span>Database</span>
            </div>
        </div>
        <div class="row">
            <div class="col tfd panel-field" style="width: 70%;">
                <input name="hostname" type="text" placeholder=" " required="true"/>
                <span>Host</span>
            </div>
            <div class="col tfd panel-field" style="width: 30%;">
                <input name="port" type="text" placeholder=" " required="true"/>
                <span>Port</span>
            </div>
        </div>
        <div class="row">
            <div class="col tfd panel-field" style="width: 50%;">
                <input name="username" type="text" placeholder=" " required="true"/>
                <span>Username</span>
            </div>
            <div class="col tfd panel-field" style="width: 50%;">
                <input name="password" type="password" placeholder=" " required="true"/>
                <span>Password</span>
            </div>
        </div>
        <div class="row right">
            <div class="col">
                <input id="btn-test-conn" type="button" value="Test connection" class="button d-inLoading" />
            </div>
            <div class="col">
                <input id="btn-connect" type="submit" value="Connect" class="button green d-inLoading" />
            </div>
        </div>
    </form>
</div>

@stop

@section('custom-js')
    <!-- View JS -->
    <script type="text/jscript" src="{{ asset('js/views/connect.js') }}"></script>

    <!-- Custom (Made by Us) -->
    <script type="text/jscript" src="{{ asset('js/custom/connect.js') }}"></script>
    <script type="text/jscript" src="{{ asset('js/custom/test-connection.js') }}"></script>

    <script type="text/javascript">
        function testConnectionPgsql() {
            $('select[name=driver]').val('pgsql');
            $('input[name=hostname]').val('{{ env('TEST_PGSQL_HOST') }}');
            $('input[name=port]').val('{{ env('TEST_PGSQL_PORT') }}');
            $('input[name=username]').val('{{ env('TEST_PGSQL_USERNAME') }}');
            $('input[name=password]').val('{{ env('TEST_PGSQL_PASSWORD') }}');
            $('input[name=database]').val('{{ env('TEST_PGSQL_DATABASE') }}');
        }

        function testConnectionMysql() {
            $('select[name=driver]').val('mysql');
            $('input[name=hostname]').val('{{ env('TEST_MYSQL_HOST') }}');
            $('input[name=port]').val('{{ env('TEST_MYSQL_PORT') }}');
            $('input[name=username]').val('{{ env('TEST_MYSQL_USERNAME') }}');
            $('input[name=password]').val('{{ env('TEST_MYSQL_PASSWORD') }}');
            $('input[name=database]').val('{{ env('TEST_MYSQL_DATABASE') }}');
        }
    </script>
@stop
