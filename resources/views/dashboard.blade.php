@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

@section('content')
    <main class="container mx-auto mt-10">
        <div class="w-full px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-300 border-green-600 bg-green-900 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <section class="bg-black border border-purple-500 rounded-md shadow-lg">

                <!-- Dashboard Header -->
                <header class="font-semibold bg-gradient-to-r from-purple-600 to-pink-500 text-white py-6 px-8 rounded-t-md text-lg text-center uppercase tracking-wider">
                    🚀 Rave Dashboard 🎶
                </header>

                <!-- Welcome Message -->
                <div class="p-6 text-white">
                    <p class="text-xl">
                        Welcome, <span class="font-bold text-neon-green">{{ Auth::user()->name }}</span>! You're vibing in the system. 🔥
                    </p>

                    <!-- Create New Post Button -->
                    <div class="mt-6 text-center">
                        <a href="{{ route('posts.create') }}" class="bg-pink-500 text-white px-6 py-3 rounded-full shadow-lg hover:bg-pink-700 transition transform hover:scale-105">
                            ➕ Drop a New Beat (Post)
                        </a>
                    </div>

                    <!-- Recent Blog Posts Section -->
                    <div class="mt-8">
                        <h2 class="text-2xl font-bold text-neon-pink text-center">🔥 Latest Tracks (Posts) 🔥</h2>

                        @if ($posts->isEmpty())
                            <p class="text-gray-400 mt-2 text-center">No beats yet. Be the first to drop one! 🎛️</p>
                        @else
                            <ul class="mt-6 space-y-4">
                                @foreach ($posts as $post)
                                    <li class="bg-gray-800 p-4 rounded-md shadow-md border border-neon-purple">
                                        <a href="{{ route('posts.show', $post->id) }}" class="text-xl font-semibold text-neon-green hover:underline">
                                            {{ $post->title }} 🎵
                                        </a>
                                        <p class="text-gray-400 text-sm">Dropped on {{ $post->created_at->format('M d, Y') }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
