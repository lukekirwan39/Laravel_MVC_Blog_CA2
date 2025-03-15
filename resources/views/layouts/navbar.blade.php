<nav class="bg-gray-900 py-6 neon-border">
    <div class="container mx-auto flex justify-between items-center px-6">
        <div>
            <a href="{{ url('/') }}" class="text-lg font-semibold text-pink-400 neon-text no-underline">
                {{ config('app.name', 'Rave Blog') }}
            </a>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('home') }}" class="text-pink-300 hover:text-pink-500">Home</a>
            <a href="{{ route('posts.index') }}" class="text-pink-300 hover:text-pink-500">Blog</a>
            <a href="{{ route('about') }}" class="text-pink-300 hover:text-pink-500">About</a>
            <a href="{{ route('contact') }}" class="text-pink-300 hover:text-pink-500">Contact</a>

            <!-- Search Bar -->
            <form action="{{ route('posts.search') }}" method="GET" class="hidden sm:flex">
                <input type="text" name="query" class="px-2 py-1 rounded bg-gray-800 text-white border-none focus:ring-2 focus:ring-pink-500" placeholder="Search...">
                <button type="submit" class="ml-2 neon-button">Go</button>
            </form>

            @guest
                <a class="hover:text-pink-500" href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a class="hover:text-pink-500" href="{{ route('register') }}">Register</a>
                @endif
            @else
                <span class="font-semibold text-pink-400">{{ Auth::user()->name }}</span>

                <a href="{{ route('logout') }}" class="hover:text-pink-500"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>

                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                        class="ml-4 bg-gray-800 px-3 py-1 rounded text-white hover:bg-gray-700">
                    <span x-show="!darkMode">🌙</span>
                    <span x-show="darkMode">☀️</span>
                </button>
            @endguest
        </div>
    </div>
</nav>
