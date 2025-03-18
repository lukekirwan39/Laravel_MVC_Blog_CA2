@extends('layouts.app')

@section('content')
    <header class="text-center text-5xl font-extrabold mb-6 rave-text-glow animate-pulse">
        Welcome to the Rave Blog 🎶
    </header>

    <nav class="flex justify-center gap-6 text-lg">
        <a href="/" class="text-cyan-400 hover:text-pink-500 font-bold">Home</a>
        <a href="/blog" class="text-cyan-400 hover:text-pink-500 font-bold">Blog</a>
        <a href="/about" class="text-cyan-400 hover:text-pink-500 font-bold">About</a>
        <a href="/contact" class="text-cyan-400 hover:text-pink-500 font-bold">Contact</a>
    </nav>

    <section class="text-center mt-10 text-lg text-pink-300">
        <p>The best place to explore rave culture, music, and lifestyle. 🔥🎧</p>
    </section>
@endsection
