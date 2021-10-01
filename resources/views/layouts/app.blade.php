<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tyrell System Assignment</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-content-between pt-8 sm:justify-start sm:pt-0">
                    <a href="{{ url('/') }}">
                        <img src={{url('/images/logo_tyrell.png')}} width="" height="50" alt=""/>
                    <a>
                    
                    <div class="pt-3">
                        <a href="{{ url('/') }}">Assignment 1</a> | <a href="{{ url('/assignment2') }}">Assignment 2</a>
                    </div>
                </div>

                <div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6" id="app">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
