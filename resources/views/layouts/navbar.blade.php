<nav class="bg-gray-900 py-4 neon-border">
    <div class="container mx-auto px-4">
        <!-- Flex container for all items -->
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div>
                <a href="{{ url('/') }}" class="text-lg font-semibold text-pink-400 neon-text no-underline">
                    {{ config('app.name', 'Rave Blog') }}
                </a>
            </div>

            <!-- Mobile Menu Button (Hamburger) -->
            <div class="sm:hidden">
                <button @click="isOpen = !isOpen" class="text-pink-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu Items -->
            <div class="hidden sm:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-pink-300 hover:text-pink-500">Home</a>
                <a href="{{ route('posts.index') }}" class="text-pink-300 hover:text-pink-500">Blog</a>
                <a href="{{ route('about') }}" class="text-pink-300 hover:text-pink-500">About</a>
                <a href="{{ route('contact') }}" class="text-pink-300 hover:text-pink-500">Contact</a>

                <!-- Search Bar -->
                <form action="{{ route('posts.search') }}" method="GET" class="flex items-center">
                    <input
                        type="text"
                        name="query"
                        class="px-4 py-2 rounded-lg bg-gray-800 text-white border-2 border-pink-500 focus:border-pink-600 focus:ring-2 focus:ring-pink-500 placeholder-gray-400 transition-all duration-300"
                        placeholder="Search..."
                        required
                    >
                    <button
                        type="submit"
                        class="ml-2 text-pink-300 hover:text-pink-500"
                    >
                        Go
                    </button>
                </form>

                <!-- Auth Links -->
                @guest
                    <a class="ml-2 text-pink-300 hover:text-pink-500" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="ml-2 text-pink-300 hover:text-pink-500" href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <span class="auth-user">{{ Auth::user()->name }}</span>

                    <!-- Logout Link -->
                    <a href="{{ route('logout') }}" class="logout-link hover:text-pink-500"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>

        <!-- Mobile Menu (Dropdown) -->
        <div x-show="isOpen" class="sm:hidden mt-4">
            <a href="{{ route('home') }}" class="block text-pink-300 hover:text-pink-500 py-2">Home</a>
            <a href="{{ route('posts.index') }}" class="block text-pink-300 hover:text-pink-500 py-2">Blog</a>
            <a href="{{ route('about') }}" class="block text-pink-300 hover:text-pink-500 py-2">About</a>
            <a href="{{ route('contact') }}" class="block text-pink-300 hover:text-pink-500 py-2">Contact</a>

            <!-- Search Bar for Mobile -->
            <form action="{{ route('posts.search') }}" method="GET" class="mt-4">
                <input
                    type="text"
                    name="query"
                    class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border-2 border-pink-500 focus:border-pink-600 focus:ring-2 focus:ring-pink-500 placeholder-gray-400 transition-all duration-300"
                    placeholder="Search..."
                    required
                >
                <button
                    type="submit"
                    class="w-full mt-2 text-pink-300 hover:text-pink-500 py-2"
                >
                    Go
                </button>
            </form>

            <!-- Auth Links for Mobile -->
            <div class="mt-4">
                @guest
                    <a class="auth-links" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="auth-links" href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <span class="auth-user text-pink-500">{{ Auth::user()->name }}</span>
                    <!-- Logout Link -->
                    <a href="{{ route('logout') }}" class="block logout-link hover:text-pink-500 py-2"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
