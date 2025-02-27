@extends('layouts.app')

@section('content')
    <main class="container mx-auto mt-10">
        <div class="w-full px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <section class="bg-white border rounded-md shadow-md">

                <!-- Dashboard Header -->
                <header class="font-semibold bg-gray-200 text-gray-700 py-6 px-8 rounded-t-md text-lg">
                    Dashboard
                </header>

                <!-- Welcome Message -->
                <div class="p-6">
                    <p class="text-gray-700 text-lg">
                        Welcome, <span class="font-bold">{{ Auth::user()->name }}</span>! You are logged in.
                    </p>

                    <!-- Create New Post Button -->
                    <div class="mt-6">
                        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 transition">
                            + Create New Post
                        </a>
                    </div>

                    <!-- Recent Blog Posts Section -->
                    <div class="mt-8">
                        <h2 class="text-xl font-bold text-gray-800">Recent Blog Posts</h2>

                        @if ($posts->isEmpty())
                            <p class="text-gray-600 mt-2">No posts available. Start by creating one!</p>
                        @else
                            <ul class="mt-4 space-y-4">
                                @foreach ($posts as $post)
                                    <li class="bg-gray-100 p-4 rounded-md shadow-md">
                                        <a href="{{ route('posts.show', $post->id) }}" class="text-lg font-semibold text-blue-600 hover:underline">
                                            {{ $post->title }}
                                        </a>
                                        <p class="text-gray-600 text-sm">Published on {{ $post->created_at->format('M d, Y') }}</p>
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
