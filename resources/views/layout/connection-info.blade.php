<!-- Custom (Made by Us) -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/views/layout/connection-info.css') }}">

<div class="panel-connection">
    <span id="label-connection" type="button" class="button">Unknown connection state.</span>

    <div class="panel-connection-info">
        <image class="connection-driver"></image>

        <div class="connection-general">
            <ul>
                <li>
                    <b>Hostname: </b>
                    <span class="connection-hostname">Unknown</span>
                </li>
                <li>
                    <b>Port: </b>
                    <span class="connection-port">Unknown</span>
                </li>
                <li>
                    <b>Username: </b>
                    <span class="connection-username">Unknown</span>
                </li>
                <li>
                    <b>Database: </b>
                    <span class="connection-database">Unknown</span>
                </li>
            <ul>
        </div>
    </div>
</div>

<!-- Custom (Made by Us) -->
<script type="text/javascript" src="{{ asset('js/views/layout/connection-info.js') }}"></script>