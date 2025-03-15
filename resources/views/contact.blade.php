@extends('layouts.app')

@section('content')

    <header class="text-center text-5xl font-extrabold mb-6 rave-text-glow animate-pulse">
        Contact Us 🎶
    </header>

    <section class="w-3/4 mx-auto text-center text-lg text-pink-300">
        <p>We'd love to hear from you! 🚀🔥</p>
        <p>Have questions, suggestions, or just want to talk about music?</p>
        <p>Fill out the form below and we'll get back to you! 🎧🎶</p>
    </section>

    <!-- Contact Form -->
    <div class="w-3/4 mx-auto mt-10 bg-black bg-opacity-60 p-6 rounded-md shadow-lg neon-border">
        <form action="{{ route('contact') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-pink-400 text-lg font-bold mb-2">Your Name</label>
                <input type="text" name="name" class="w-full p-3 rounded-md bg-gray-800 text-white border-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div class="mb-4">
                <label class="block text-pink-400 text-lg font-bold mb-2">Your Email</label>
                <input type="email" name="email" class="w-full p-3 rounded-md bg-gray-800 text-white border-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div class="mb-4">
                <label class="block text-pink-400 text-lg font-bold mb-2">Your Message</label>
                <textarea name="message" rows="5" class="w-full p-3 rounded-md bg-gray-800 text-white border-none focus:ring-2 focus:ring-pink-500"></textarea>
            </div>

            <button type="submit" class="rave-button">Send Message</button>
        </form>
    </div>

@endsection
