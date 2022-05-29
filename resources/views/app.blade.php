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

    @routes
    @production
    @vite
    @endproduction
    @env('local')
    @verbatim
    <script type="module" src="http://localhost:3000/@vite/client"></script>
    @endverbatim
    @endenv
</head>

<body class="font-sans antialiased">
    @inertia
</body>

@env('local')
<script type="module" src="http://localhost:3000/resources/js/main.ts"></script>
@endenv

</html>