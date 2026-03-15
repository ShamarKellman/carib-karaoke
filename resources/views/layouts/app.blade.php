<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="flex flex-col min-h-screen font-sans text-gray-100 antialiased bg-gray-950 selection:bg-violet-500 selection:text-white">

        <header class="sticky top-0 z-50 border-b border-white/10 bg-gray-950/80 backdrop-blur-lg">
            <nav class="container mx-auto px-4 py-4">
                <div class="flex items-center justify-between gap-4">
                    <a href="{{ url('/') }}" class="font-extrabold text-2xl bg-gradient-to-r from-violet-400 to-pink-400 bg-clip-text text-transparent shrink-0">
                        {{ config('app.name') }}
                    </a>

                    <div class="flex items-center gap-1 sm:gap-2">
                        <a href="{{ route('search') }}" class="px-3 py-1.5 text-sm font-medium text-gray-400 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200">
                            Search
                        </a>
                        @auth
                            <a href="{{ route('favourites') }}" class="px-3 py-1.5 text-sm font-medium text-gray-400 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200">
                                Favourites
                            </a>
                            <a href="{{ route('profile.show') }}" class="px-3 py-1.5 text-sm font-medium text-gray-400 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200">
                                Profile
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-3 py-1.5 text-sm font-medium text-gray-400 hover:text-white rounded-lg hover:bg-white/5 transition-all duration-200">
                                Log in
                            </a>
                            <a href="{{ route('register') }}" class="px-4 py-1.5 text-sm font-semibold text-white bg-gradient-to-r from-violet-600 to-pink-600 hover:from-violet-500 hover:to-pink-500 rounded-full transition-all duration-200 shadow-lg shadow-violet-900/30">
                                Register
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
        <main class="flex grow container mx-auto px-4 py-8">
            {{ $slot }}
        </main>

        <footer class="border-t border-white/10 py-6 mt-8">
            <div class="container mx-auto px-4 text-center text-gray-600 text-sm">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>
        </footer>

        @stack('modals')

        @livewireScripts
    </body>
</html>
