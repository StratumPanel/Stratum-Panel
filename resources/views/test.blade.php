<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Test</title>

        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
    </head>
    <body>
        <noscript>Please enable JavaScript</noscript>
        <div id="app"></div>
        <script src="{{ asset('js/client/main.js') }}"></script>

        
        @if(!is_null(Auth::user()))
            <script>
                window.StratumUser = {!! json_encode(Auth::user()->toVueObject()) !!};
            </script>
        @endif
    </body>
</html>
