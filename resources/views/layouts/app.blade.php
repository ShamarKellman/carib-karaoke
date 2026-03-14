<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="flex flex-col min-h-screen font-sans text-gray-900 dark:text-gray-100 antialiased bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <header class="bg-blue-950 p-4">
            <nav class="container mx-auto">
                <div class="flex text-center md:text-inherit flex-col md:flex-row justify-center md:justify-between">
                    <a href="{{ url('/') }}" class="font-extrabold text-2xl">{{ config('app.name') }}</a>
                    <div>
                        <a href="{{ route('search') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-solid focus:outline-2 focus:rounded-xs focus:outline-red-500">Search</a>
                        @auth
                            <a href="{{ route('favourites') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-solid focus:outline-2 focus:rounded-xs focus:outline-red-500">Favourites</a>
                            <a href="{{ route('profile.show') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-solid focus:outline-2 focus:rounded-xs focus:outline-red-500">Profile</a>
                        @else
                            <a href="{{ route('login') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-solid focus:outline-2 focus:rounded-xs focus:outline-red-500">Log in</a>
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-solid focus:outline-2 focus:rounded-xs focus:outline-red-500">Register</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
        <main class="flex grow container mx-auto p-4">
            {{ $slot }}
        </main>

        <footer class="bg-blue-950 text-center px-6 py-4">
            <div>
                &copy; {{ config('app.name') }} All rights reserved
            </div>
        </footer>

        @stack('modals')

        @livewireScripts
    </body>
</html>
