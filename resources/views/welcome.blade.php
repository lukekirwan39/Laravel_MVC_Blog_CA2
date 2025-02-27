<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tech Insights') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">

<!-- Navbar -->
<nav class="bg-blue-600 p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-white text-2xl font-bold">Tech Insights</a>
        <div class="space-x-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-white hover:underline">Dashboard</a>
                <a href="{{ route('logout') }}" class="text-white hover:underline"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="text-white hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-white hover:underline">Register</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Hero Section -->
<header class="bg-gray-900 text-white text-center py-20">
    <h1 class="text-5xl font-extrabold">Welcome to Tech Insights</h1>
    <p class="mt-4 text-lg">Your go-to platform for the latest technology news, tutorials, and reviews.</p>
    <a href="{{ route('posts.index') }}" class="mt-6 inline-block bg-blue-500 px-6 py-3 text-lg font-semibold rounded shadow hover:bg-blue-700 transition">
        Explore Posts
    </a>
</header>

<!-- Recent Posts Section -->
<section class="container mx-auto mt-10 p-6">
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Recent Blog Posts</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <div class="bg-white p-4 rounded shadow-md">
                <h3 class="text-xl font-semibold text-blue-600">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:underline">
                        {{ $post->title }}
                    </a>
                </h3>
                <p class="text-gray-600">{{ Str::limit($post->content, 100) }}</p>
                <p class="text-sm text-gray-500 mt-2">By {{ $post->author }} | {{ $post->created_at->format('M d, Y') }}</p>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('posts.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded shadow hover:bg-blue-700 transition">
            View All Posts
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white text-center py-6 mt-10">
    <p>&copy; {{ date('Y') }} Tech Insights. All Rights Reserved.</p>
</footer>

</body>
</html>
