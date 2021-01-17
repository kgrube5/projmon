<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projmon</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>

    </head>
    <body class="antialiased">
        <div id="app" class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <app></app>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
