<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.ts'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-br from-gray-100 via-gray-200 to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 transition-colors duration-300">
            <!-- Theme Toggle - Top Right -->
            <div class="absolute top-4 right-4">
                <button type="button" 
                        @click="$store.theme.toggle()"
                        class="p-3 rounded-full bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 shadow-lg transition-all duration-300">
                    <svg x-show="!$store.theme.isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    <svg x-show="$store.theme.isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                    </svg>
                </button>
            </div>

            <div class="relative min-h-screen flex flex-col items-center justify-center px-4">
                <!-- Logo -->
                <div class="mb-8 transition-transform duration-300 hover:scale-105">
                    <a href="{{ route('login') }}" class="inline-block">
                        <x-application-logo class="w-24 h-24 fill-current text-gray-500 dark:text-gray-400" />
                    </a>
                </div>

                <!-- Welcome Text -->
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ config('app.name', 'Laravel') }}
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 text-center max-w-md">
                    Bem-vindo à sua plataforma de aprendizado
                </p>

                <!-- Auth Links -->
                <div class="space-x-4">
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center px-6 py-3 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-lg font-semibold text-white hover:bg-indigo-700 dark:hover:bg-indigo-400 focus:bg-indigo-700 dark:focus:bg-indigo-400 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300">
                        Entrar
                    </a>
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300">
                        Registrar
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
