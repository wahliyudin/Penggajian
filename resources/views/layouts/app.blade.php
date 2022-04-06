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
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('vendor/metis-menu/metismenu.css') }}">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        @stack('css')
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            <div class="">
                @livewire('navigation-menu')
                @livewire('component.sidebar')
            </div>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow ml-52 pt-14">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="ml-52">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <script src="{{ asset('vendor/metis-menu/jquery.js') }}"></script>
        <script src="{{ asset('vendor/metis-menu/metismenu.js') }}"></script>
        <script src="{{ asset('assets/custom.js') }}"></script>
        @stack('js')
        @livewireScripts
        <script src="{{ asset('vendor/livewire-alert/sweetalert.min.js') }}"></script>
        <x-livewire-alert::scripts />
    </body>
</html>
