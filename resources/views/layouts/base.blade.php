<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">
        <!-- Fonts -->
        <script src="https://kit.fontawesome.com/c12c059ff2.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        @stack('styles')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('build/assets/app-0daaa0d0.css') }}">
        <script src="{{ asset('build/assets/app-a6d2e222.js') }}"></script>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body class="antialiased font-inter bg-yellow-50">
        @include('partials.navbar')
        @if(session('success'))
            <x-alert.success>{{session('success')}}</x-alert.success>
        @endif

        @if(session('error'))
        <x-alert.error>{{session('error')}}</x-alert.error>
        @endif

        <div class="container h-full mx-auto">
                @yield('body')
        </div>
        @stack('scripts')
    </body>
</html>
