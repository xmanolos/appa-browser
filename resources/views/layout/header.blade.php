<!-- View CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/views/layout/header.css') }}">

<div class="header">
    <div class="panel-logo">
        <img src="{{ asset('images/logo/face.svg') }}" />
    </div>

    @include('layout.connection-info')

    <div class="panel-exit">
        <a id="lnk-exit" href="#" title="Disconnect">
        	<i class="la la-unlink"></i>
        </a>
    </div>
</div>

<!-- View JS -->
<script type="text/javascript" src="{{ asset('js/views/layout/header.js') }}"></script>

<!-- Custom (Made by Us) -->
<script type="text/javascript" src="{{ asset('js/custom/disconnection.js') }}"></script>