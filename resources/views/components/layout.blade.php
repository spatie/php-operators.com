<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PHP operators</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-mono antialiased bg-php-violet-light text-php-gray-dark dark:bg-php-gray-dark dark:text-white">
        {{ $slot }}
    </body>

    <script src="https://kit.fontawesome.com/179125d0a6.js" crossorigin="anonymous"></script>
</html>
