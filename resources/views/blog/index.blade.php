@extends('layouts.app')

@section('content')
<div class="responsive-image">
    <img src="{{ asset('images/rave-background.jpg') }}" alt="Rave Background">
</div>

<div class="text-center py-15">
    <h1 class="text-6xl">Blog Posts</h1>
</div>

{{--<form method="GET" action="{{ route('posts.index') }}">--}}
{{--    <select name="category_id" onchange="this.form.submit()">--}}
{{--        <option value="">All Categories</option>--}}
{{--        @foreach($categories as $category)--}}
{{--            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>--}}
{{--                {{ $category->name }}--}}
{{--            </option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--</form>--}}

@if (session()->has('message'))
    <div class="mt-10 pl-2">
        <p class="mb-4 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check())
    <div class="pt-15">
        <a href="/blog/create" class="bg-blue-500 uppercase text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create post
        </a>
    </div>
@endif

@foreach ($posts as $post)
    <div class="sm:grid grid-cols-2 gap-20 py-15 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
        </div>
        <div>
            <h2 class="text-5xl pb-4">{{ $post->title }}</h2>
            <span>By <span class="font-bold italic">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
            <p class="text-xl pt-8 pb-10 leading-8 font-light">{{ $post->description }}</p>
            <a href="/blog/{{ $post->slug }}" class="bg-blue-500 text-lg font-extrabold py-4 px-8 rounded-3xl">Keep Reading</a>
            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <span class="float-right">
                    <a href="/blog/{{ $post->slug }}/edit" class="italic hover:text-gray-900 pb-1 border-b-2">Edit</a>
                </span>
                <span class="float-right">
                    <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="text-red-500 pr-3" type="submit">Delete</button>
                    </form>
                </span>
            @endif
        </div>
    </div>
@endforeach
@endsection
