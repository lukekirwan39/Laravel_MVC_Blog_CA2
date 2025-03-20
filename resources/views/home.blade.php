@extends('layouts.app')

@section('content')
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center text-pink-400 neon-glow">Your Personalized Home Dashboard</h2>
        <p class="text-center text-lg text-cyan-300 mt-4">Explore the latest posts and updates from the rave scene.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
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
        </div>
    </section>
@endsection
