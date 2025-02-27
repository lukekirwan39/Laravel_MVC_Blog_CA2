@extends('layouts.app')

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

    <!-- About Section -->
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" width="700" alt="Laptop">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Struggling to be a better web developer?
            </h2>
            <p class="py-8 text-gray-500">
                Learn the latest technologies and improve your web development skills.
            </p>
            <p class="font-extrabold text-gray-600 pb-9">
                Get expert tips and strategies for mastering front-end and back-end development.
            </p>
            <a href="/blog" class="uppercase bg-blue-500 text-gray-100 font-extrabold py-3 px-8 rounded-3xl">
                Find Out More
            </a>
        </div>
    </div>

    <!-- Skills Section -->
    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5">
            I'm an expert in...
        </h2>
        <span class="font-extrabold block text-4xl py-1">UX Design</span>
        <span class="font-extrabold block text-4xl py-1">Project Management</span>
        <span class="font-extrabold block text-4xl py-1">Digital Strategy</span>
        <span class="font-extrabold block text-4xl py-1">Backend Development</span>
    </div>

    <!-- Recent Posts Section -->
    <div class="text-center py-15">
        <span class="uppercase text-gray-400">Blog</span>
        <h2 class="text-4xl font-bold py-10">Recent Posts</h2>
        <p class="m-auto w-4/5 text-gray-500">
            Stay updated with the latest programming and technology trends.
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5">
                <span class="uppercase text-xs">PHP</span>
                <h3 class="text-xl font-bold py-10">
                    Discover the best PHP frameworks and improve your backend skills.
                </h3>
                <a href="" class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>
            </div>
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt="Laptop">
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
