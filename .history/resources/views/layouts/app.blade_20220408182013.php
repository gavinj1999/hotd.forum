<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>House of the Dragon Forum</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans text-gray-900 text-sm">
        <header class="flex items-center justify-between px-8 py-4">
            <a href="#">HOTD Logo</a>
            <div>
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/0000000000000000000000000000?d=mp&f=y" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>
    </body>
</html>
