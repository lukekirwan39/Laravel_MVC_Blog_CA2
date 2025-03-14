<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rave Blog</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>

    <style>
        /* Background Image */
        body {
            background: url('{{ asset("images/rave-bg.jpg") }}') no-repeat center center fixed;
            background-size: cover;
            color: #f9a8d4;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Semi-transparent overlay for readability */
        .overlay {
            background: rgba(0, 0, 0, 0.7); /* Dark overlay */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Text Glow Effect */
        .rave-text-glow {
            text-shadow: 0 0 10px #f472b6, 0 0 20px #db2777, 0 0 30px #f472b6;
        }

        /* Neon-style buttons */
        .rave-button {
            background-color: #f472b6;
            padding: 8px 16px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .rave-button:hover {
            background-color: #db2777;
            transform: scale(1.05);
        }

        /* Blog post card */
        .rave-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 15px rgba(255, 105, 180, 0.5);
        }

        .rave-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px;
            font-size: 1.2rem;
        }
    </style>
</head>

<body class="h-screen flex flex-col">

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
