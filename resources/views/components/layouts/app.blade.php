<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#E6E6F2" media="(prefers-color-scheme: light)" />
        <meta name="theme-color" content="#202023" media="(prefers-color-scheme: dark)" />

        <title>PHP Operators</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-mono antialiased bg-php-violet-light text-php-gray-dark dark:bg-php-gray-dark dark:text-white selection:bg-php-purple-light">
        {{ $slot }}

        @livewireScripts
    </body>
</html>
