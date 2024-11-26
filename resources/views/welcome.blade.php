<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Farm Welcome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-lightblue bg-cover bg-center" style="background-image: url('{{ asset('images/actionsfarm.png') }}');">
        <div class="text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-start justify-center pl-10 selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="flex items-center gap-4 py-10">
                        <!-- Logo and Text aligned to the left -->
                        <div class="flex items-center gap-4">
                            <!-- Logo image (can replace with an actual image URL) -->
                            <img src="{{ asset('images/logoaction.png') }}" alt="Farm Logo" class="h-12 w-auto" />
                            <!-- Action Farm Text -->
                            <h1 class="text-5xl font-bold text-black dark:text-white">Action <br> Farm</h1>
                        </div>
                    </header>

                    <main class="mt-6 flex flex-col items-start gap-6">
                        <!-- Login Button -->
                        <a
                            href="{{ route('login') }}"
                            class="flex items-center justify-center gap-4 p-4 bg-blue-500 text-white rounded-md transition duration-300 hover:bg-blue-400 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            <span class="text-lg font-semibold">Log in</span>
                        </a>

                        <!-- Register Button -->
                        {{-- <a
                            href="{{ route('register') }} "
                            class="flex items-center justify-center gap-4 p-4 bg-blue-500 text-white rounded-md transition duration-300 hover:bg-blue-400 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            <span class="text-lg font-semibold">Sign Up</span>
                        </a> --}}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
