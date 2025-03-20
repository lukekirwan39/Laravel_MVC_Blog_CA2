<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/rave.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rave Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="h-screen antialiased leading-none font-sans"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      :class="{ 'bg-gray-900 text-white': darkMode }">

<div id="app">

    <!-- Include Navbar -->
    <div x-data="{ isOpen: false }">
        @include('layouts.navbar')

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-500 text-white text-center py-2 neon-border">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white text-center py-2 neon-border">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Main Content Area -->
    <div class="container mx-auto flex">
        <!-- Sidebar (Only for logged-in users) -->
        @auth
            <aside class="w-1/4 p-4 hidden sm:block">
                <div class="bg-gray-900 text-white p-4 rounded neon-border">
                    <h3 class="text-lg font-semibold mb-2 neon-text">Dashboard</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/dashboard') }}" class="hover:text-pink-500">Dashboard</a></li>
                        <li><a href="{{ route('posts.create') }}" class="hover:text-pink-500">Create Post</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:text-pink-500">Manage Posts</a></li>
                    </ul>
                </div>
            </aside>
        @endauth

        <!-- Page Content -->
        <main class="w-full sm:w-3/4 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-pink-400 text-center py-6 mt-10 neon-border">
        <div class="container mx-auto">
            <p>&copy; {{ date('Y') }} Rave Blog. Keep the music alive! 🎶🔥</p>
            <div class="mt-2 space-x-4">
                <a href="https://twitter.com" target="_blank" class="hover:text-pink-500">Twitter</a>
                <a href="https://github.com" target="_blank" class="hover:text-pink-500">GitHub</a>
                <a href="https://linkedin.com" target="_blank" class="hover:text-pink-500">LinkedIn</a>
            </div>
        </div>
    </footer>

</div>
</body>
</html>
