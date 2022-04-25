<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        @production
            <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @endproduction
        @env('local')
            <link rel="stylesheet" href="http://localhost:4206/css/app.css">
        @endenv


        <!-- Scripts -->
        @routes
        @production
            <script src="{{ mix('js/main.js') }}" defer></script>
        @endproduction
        @env('local')
            <script src="http://localhost:4206/js/main.js" defer></script>
        @endenv
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
