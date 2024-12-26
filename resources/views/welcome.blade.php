<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Expense Tracker System - Track and manage your expenses efficiently.">
    <meta name="keywords" content="Expense Tracker, Finance Management, Budget Tracker">
    <meta name="author" content="Your Name or Company">
    <title>Expense Tracker System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    @endif
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
    <div class="flex flex-col min-h-screen">

        <header class="w-full py-4 bg-blue-600 text-white text-center shadow-md">
            <h1 class="text-2xl font-semibold text-black">Expense Tracker System</h1>
        </header>

        <main class="flex-grow flex flex-col items-center justify-center w-32 max-w-4xl p-6 bg-gray-800 rounded-lg shadow-lg mt-6 mb-6 mx-auto">
            <h2 class="text-xl font-bold mb-4 text-white">Welcome to the Expense Tracker System</h2>
            <p class="mb-4 text-white">Track and manage your expenses effortlessly. Get started by adding your first expense!</p>
            <div class="grid grid-cols-2 gap-4">
                @auth
                    <!-- Show Dashboard button for authenticated users -->
                    <a style="text-align: center; background: green; padding: 6px; border-radius: 4px; color: white;" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                @endauth
            
                @guest
                    <!-- Show Login button for guests -->
                    <a style="text-align: center; background: blue; padding: 6px; border-radius: 4px; color: white;" href="{{ route('login') }}">
                        Log in
                    </a>
            
                    @if (Route::has('register'))
                        <!-- Show Register button for guests -->
                        <a style="text-align: center; background: blue; padding: 6px; border-radius: 4px; color: white;" href="{{ route('register') }}">
                            Register
                        </a>
                    @endif
                @endguest
            </div>
            
        </main>

        <footer class="w-full py-4 bg-gray-800 text-white text-center">
            <p>&copy; {{ date('Y') }} Expense Tracker. All Rights Reserved.</p>
        </footer>
    </div>
</body>

</html>
