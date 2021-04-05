<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Test</title>

        <link type="stylesheet" href="{{ asset('css/client/app.css') }}">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <noscript>Please enable JavaScript</noscript>
        <div id="app"></div>

        
        @if(!is_null(Auth::user()))
            <script>
                window.StratumUser = {!! json_encode(Auth::user()->toVueObject()) !!};
            </script>
        @endif
        <script src="{{ mix('js/client/main.js') }}"></script>
    </body>
</html>
