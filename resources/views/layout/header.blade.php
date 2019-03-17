<!-- View CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/views/layout/header.css') }}">

<!-- Custom (Made by Us) -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom/connection-info.css') }}">

<div class="header">
    <div class="panel-logo"></div>
    <div id="panel-db-data" class="panel-db-data">
    	<input id="label-connection" type="button" value="Unknown connection state." class="button">
    </div>
    <div class="panel-exit">
        <a href="{{ route('api.connection.disconnect') }}" title="Disconnect"><i class="la la-unlink"></i></a>
    </div>
</div>

<!-- View JS -->
<script type="text/javascript" src="{{ asset('js/views/layout/header.js') }}"></script>

<!-- Custom (Made by Us) -->
<script type="text/javascript" src="{{ asset('js/custom/connection-info.js') }}"></script>