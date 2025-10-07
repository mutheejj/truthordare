<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') - Truth or Dare</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Space Grotesk', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-black text-white border-b-4 border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('admin.index') }}" class="text-xl font-bold">ADMIN PANEL</a>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('admin.truths.index') }}" class="hover:text-gray-300 transition">Truths</a>
                    <a href="{{ route('admin.dares.index') }}" class="hover:text-gray-300 transition">Dares</a>
                    <a href="{{ route('game.index') }}" class="bg-white text-black px-4 py-2 font-semibold hover:bg-gray-100 transition">View Game</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Success Message -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-50 border-2 border-green-500 text-green-800 px-4 py-3 font-medium">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>
</body>
</html>

