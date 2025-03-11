<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      :class="{ 'bg-gray-900 text-white': darkMode }">

<div id="app">

    <!-- Navbar -->
    <header class="bg-gray-800 py-6">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div>
                <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                    {{ config('app.name', 'Laravel Blog') }}
                </a>
            </div>
            <nav class="space-x-4 text-gray-300 text-sm sm:text-base flex items-center">
                <a class="no-underline hover:underline" href="/">Home</a>
                <a class="no-underline hover:underline" href="/blog">Blog</a>

                <!-- Search Bar -->
                <form action="{{ route('posts.search') }}" method="GET" class="hidden sm:flex">
                    <input type="text" name="query" class="px-2 py-1 rounded bg-gray-700 text-white border-none focus:ring-2 focus:ring-blue-500" placeholder="Search...">
                    <button type="submit" class="ml-2 bg-blue-500 px-3 py-1 text-white rounded hover:bg-blue-600">Go</button>
                </form>

                @guest
                    <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <span class="font-semibold">{{ Auth::user()->name }}</span>

                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>

                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                            class="ml-4 bg-gray-700 px-3 py-1 rounded text-white hover:bg-gray-600">
                        <span x-show="!darkMode">🌙</span>
                        <span x-show="darkMode">☀️</span>
                    </button>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-500 text-white text-center py-2">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white text-center py-2">
            {{ session('error') }}
        </div>
    @endif

    <!-- Main Content Area -->
    <div class="container mx-auto flex">
        <!-- Sidebar (Only for logged-in users) -->
        @auth
            <aside class="w-1/4 p-4 hidden sm:block">
                <div class="bg-gray-800 text-white p-4 rounded">
                    <h3 class="text-lg font-semibold mb-2">Dashboard</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/dashboard') }}" class="hover:underline">Dashboard</a></li>
                        <li><a href="{{ route('posts.create') }}" class="hover:underline">Create Post</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:underline">Manage Posts</a></li>
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
    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <div class="container mx-auto">
            <p>&copy; {{ date('Y') }} Laravel Blog. All Rights Reserved.</p>
            <div class="mt-2 space-x-4">
                <a href="https://twitter.com" target="_blank" class="hover:underline">Twitter</a>
                <a href="https://github.com" target="_blank" class="hover:underline">GitHub</a>
                <a href="https://linkedin.com" target="_blank" class="hover:underline">LinkedIn</a>
            </div>
        </div>
    </footer>

</div>
</body>
</html>
