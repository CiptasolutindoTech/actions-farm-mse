<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Actions') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        {{-- icon --}}
        <link rel="shortcut icon" href="{{ asset('images/logoaction.png') }}" />

        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/theme.js') }}" defer></script>

        {{-- datatables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 py-1 mt-1">
            <div class="max-w-7xl mx-auto text-center text-gray-600 dark:text-gray-300">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</p>
                <p class="text-sm">Built with ❤️ by CiptaSolutindo</p>
            </div>
        </footer>
    </body>
</html>
