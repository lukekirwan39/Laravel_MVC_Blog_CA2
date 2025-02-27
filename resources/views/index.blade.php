@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('content')

    <!-- Hero Section -->
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Do you want to become a developer?
                </h1>
                <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>

    <!-- Blog Posts Section -->
    <div class="w-4/5 mx-auto py-10">
        <h1 class="text-3xl font-bold mb-4">Blog Posts</h1>

        @if($posts->isEmpty())
            <p class="text-gray-600">No posts found.</p>
        @else
            @foreach ($posts as $post)
                <div class="bg-white p-4 rounded shadow-md mb-4">
                    <h2 class="text-xl font-semibold">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600">{{ Str::limit($post->content, 150) }}</p>
                    <div class="mt-3">
                        <a href="{{ route('posts.show', $post->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow-md hover:bg-blue-700 transition">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
