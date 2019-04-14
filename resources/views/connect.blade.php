@extends('master')

@section('title', 'Connect')

@section('custom-styles')
    <!-- View CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/views/connect.css') }}">
@stop

@section('content')
<div class="center-center panel-connect">
    <form id="form" class="ui form clearing segment stacked">
        <div class="fields">
            <div class="field eight wide">
                <select name="driver" class="ui fluid dropdown"></select>
            </div>

            <div class="field eight wide">
                <input name="database" type="text" placeholder="Database">
            </div>
        </div>

        <div class="fields">
            <div class="field eleven wide">
                <input name="host" type="text" placeholder="Host">
            </div>

            <div class="field five wide">
                <input name="port" type="text" class="only-numbers" placeholder="Port">
            </div>
        </div>

        <div class="fields">
            <div class="field eight wide">
                <input name="username" type="text" placeholder="Username">
            </div>

            <div class="field eight wide">
                <input name="password" type="password" placeholder="Password">
            </div>
        </div>

        <div class="fields">
            <div class="field sixteen wide">
                <button name="save-connection" class="ui button left floated">
                    Save connection
                </button>

                <button name="connect" class="ui button right floated">
                    Connect
                </button>

                <button name="test-connection" class="ui button right floated">
                    Test connection
                </button>
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

    <!-- Test Connections -->
    <script type="text/javascript">
        function testConnectionPgsql() {
            $("select[name='driver']").dropdown("set selected", "pgsql");
            $("input[name='database']").val("{{ env('DATA_PGSQL_DATABASE') }}");
            $("input[name='host']").val("{{ env('DATA_PGSQL_HOST') }}");
            $("input[name='port']").val("{{ env('DATA_PGSQL_PORT') }}");
            $("input[name='username']").val("{{ env('DATA_PGSQL_USERNAME') }}");
            $("input[name='password']").val("{{ env('DATA_PGSQL_PASSWORD') }}");
        }

        function testConnectionMysql() {
            $("select[name='driver']").dropdown("set selected", "mysql");
            $("input[name='database']").val("{{ env('DATA_MYSQL_DATABASE') }}");
            $("input[name='name']").val("{{ env('DATA_MYSQL_HOST') }}");
            $("input[name='port']").val("{{ env('DATA_MYSQL_PORT') }}");
            $("input[name='username']").val("{{ env('DATA_MYSQL_USERNAME') }}");
            $("input[name='password']").val("{{ env('DATA_MYSQL_PASSWORD') }}");
        }
    </script>
@stop
