@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Welcome back, {{ auth()->user()->name }} 👋</h2>
        <p class="text-gray-600 dark:text-gray-400">Here's a quick look at what's happening in your blog today.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card p-4 shadow">
            <h3 class="text-lg font-semibold text-gray-700">Total Posts</h3>
            <p class="text-3xl font-bold text-primary mt-2">{{ \App\Models\Post::count() }}</p>
        </div>
        <div class="card p-4 shadow">
            <h3 class="text-lg font-semibold text-gray-700">Pending Comments</h3>
        </div>
        <div class="card p-4 shadow">
            <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
            <p class="text-3xl font-bold text-green-500 mt-2">{{ \App\Models\User::count() }}</p>
        </div>
    </div>

    <div class="card p-6 mt-6">
        <h3 class="text-xl font-semibold mb-4">Latest Posts</h3>
        <ul class="space-y-4">
            @foreach(\App\Models\Post::latest()->take(5)->get() as $post)
                <li class="border-b pb-2">
                    <span class="text-sm text-gray-500 ml-2">({{ $post->created_at->format('M d, Y') }})</span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
