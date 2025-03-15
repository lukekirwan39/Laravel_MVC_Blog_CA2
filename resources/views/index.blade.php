<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rave Blog</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
</head>

<body class="h-screen flex flex-col relative">

<!-- Overlay for readability -->
<div class="overlay"></div>

<!-- Neon Header -->
<header class="text-center text-5xl font-extrabold mb-6 rave-text-glow animate-pulse">
    Welcome to the Rave Blog 🎶
</header>

<!-- Navigation Bar -->
<nav class="flex justify-center gap-6 text-lg">
    <a href="/" class="text-cyan-400 hover:text-pink-500 font-bold">Home</a>
    <a href="/blog" class="text-cyan-400 hover:text-pink-500 font-bold">Blog</a>
    <a href="/about" class="text-cyan-400 hover:text-pink-500 font-bold">About</a>
    <a href="/contact" class="text-cyan-400 hover:text-pink-500 font-bold">Contact</a>
</nav>

<!-- Blog Posts Section -->
<main class="mt-10 w-3/4 mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($posts as $post)
        <div class="rave-card">
            <img src="{{ asset($post->image_url) }}" alt="{{ $post->title }}">
            <div class="p-4">
                <h2 class="text-2xl font-bold rave-text-glow text-purple-300">{{ $post->title }}</h2>
                <p class="text-sm text-blue-300">{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="rave-button mt-4">Read More</a>
            </div>
        </div>
    @endforeach
</main>

<!-- Footer -->
<footer class="mt-auto text-pink-400">
    &copy; {{ date('Y') }} Rave Blog. Keep the music alive! 🎧🔥
</footer>

</body>
</html>
