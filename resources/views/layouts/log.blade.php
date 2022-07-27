<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}?<?= date('YmdHis'); ?>">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}?<?= date('YmdHis'); ?>">
        <link rel="stylesheet" href="{{ asset('css/log.css') }}?<?= date('YmdHis'); ?>">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/customers.js') }}?<?= date('YmdHis'); ?>" defer></script>
        <script src="{{ asset('js/common.js') }}?<?= date('YmdHis'); ?>" defer></script>
        <script src="{{ asset('js/log.js') }}?<?= date('YmdHis'); ?>" defer></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @if(auth('admin')->user())
                @include('layouts.navigation-admin')
            @elseif(auth('users')->user())
                @include('layouts.navigation-user')
            @endif

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
